import axios from 'axios'

const API_URL = 'http://localhost:8000/api/admin/'

class AdminService {
    add(data) {
        return axios
            .post(API_URL + 'add', {
                recipe: data.recipe,
                ingredients: data.ingredients,
                directions: data.directions,
            })
            .then((response) => {
                return response.data
            })
    }

    update(data) {
        return axios
            .post(API_URL + `update/${data.id}`, {
                recipe: data.recipe,
                ingredients: data.ingredients,
                directions: data.directions,
            })
            .then((response) => {
                return response.data
            })
    }

    delete(id) {
        return axios
            .post(API_URL + `delete/${id}` )
            .then((response) => {
                return response.data
            })
    }

    getAll() {
        return axios
            .post(API_URL + 'getAll')
            .then((response) => {
                return response.data
            })
    }
}

export default new AdminService()
