import axios from 'axios'

const API_URL = 'http://localhost:8000/api/auth/'

class AuthService {
    login(user) {
        return axios
            .post(API_URL + 'login', {
                email: user.email,
                password: user.password,
            })
            .then((response) => {
                if (response.data.state === 'success') {
                    localStorage.setItem('user', JSON.stringify(response.data.data))
                }
                return response.data
            })
    }

    logout() {
        localStorage.removeItem('user')
    }

    register(user) {
        return axios
            .post(API_URL + 'register', {
                name: user.username,
                email: user.email,
                password: user.password,
                role: 'admin',
            })
            .then((response) => {
                return response.data
            })
    }
}

export default new AuthService()
