import AdminService from '../services/admin.service'

export const admin = {
    namespaced: true,
    actions: {
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
