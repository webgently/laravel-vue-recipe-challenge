import axios from 'axios'

const API_URL = 'http://localhost:8000/api/admin/'

class AdminService {
    getAll() {
        return axios
            .post(API_URL + 'getAll')
            .then((response) => {
                return response.data
            })
    }
}

export default new AdminService()
