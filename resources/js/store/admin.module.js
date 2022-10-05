import AdminService from '../services/admin.service'

export const admin = {
    namespaced: true,
    actions: {
        add({ commit }, data) {
            return AdminService.add(data).then(
                (response) => {
                    return Promise.resolve(response)
                },
                (error) => {
                    return Promise.reject(error)
                }
            )
        },

        update({commit}, data) {
            return AdminService.update(data).then(
                (response) => {
                    return Promise.resolve(response)
                },
                (error) => {
                    return Promise.reject(error)
                }
            )
        },

        delete({commit}, id) {
            return AdminService.delete(id).then(
                (response) => {
                    return Promise.resolve(response)
                },
                (error) => {
                    return Promise.reject(error)
                }
            )
        },

        getAll() {
            return AdminService.getAll().then(
                (response) => {
                    return Promise.resolve(response)
                },
                (error) => {
                    return Promise.reject(error)
                }
            )
        },
    }
}
