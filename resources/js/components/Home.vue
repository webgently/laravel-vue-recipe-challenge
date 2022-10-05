<template>
    <nav class="bg-gray-800 fixed top-0 left-0 right-0 z-10">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                    </div>
                </div>

                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" @click="handleUser" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <img class="h-8 w-8 rounded-full" src="https://img.freepik.com/free-psd/3d-illustration-person-tank-top_23-2149436199.jpg" alt="">
                            </button>
                        </div>
                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1
                            shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" :class="{'hidden': isActive}" tabindex="-1">
                            <button @click="logOut" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-24">
        <h1 class="text-white text-4xl text-center">Recipe Box</h1>
        <div class="xl:flex lg:flex md:flex block xl:px-20 lg:px-10 md:px-4 sm:px-16 px-4 py-10">
            <div class="xl:w-1/4 lg:w-1/4 md:w-1/4 w-full mr-4">
                <div class="flex justify-between py-2">
                    <p class="text-white xl:text-3xl lg:text-2xl md:text-xl sm:text-lg text-md">Recipes</p>
                    <div v-if="role === 'admin'" class="flex items-center">
                        <button type="button" @click="openModal(-1)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                    </div>
                    <div v-else></div>
                </div>
                <div class="block menu rounded-box bg-gray-800 p-6 rounded text-white overflow-auto xl:h-[70vh] lg:h-[70vh] md:h-[70vh] h-[50vh] scrollbar-thin scrollbar-thumb-stone-800 scrollbar-track-slate-600">
                    <p v-for="(data, index) in datas" @click="itemSelect(data)" :class="{'active': isSelect === index }"
                       class="recipe-list my-1 px-4 py-2 rounded-md xl:text-2xl lg:text-xl text-lg">
                        {{ data.recipe }}
                    </p>
                </div>
            </div>
            <div class="xl:w-3/4 lg:w-3/4 md:w-3/4 w-full mr-4 xl:pt-0 lg:pt-0 md:pt-0 pt-4">
                <div class="flex justify-between py-2">
                    <p class="text-white xl:text-3xl lg:text-2xl md:text-xl sm:text-lg text-md">{{ element.recipe }}</p>
                    <div v-if="role === 'admin'" class="flex items-center">
                        <button type="button" @click="deleteItem(element.id)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-1">Delete</button>
                        <button type="button" @click="openModal(element.id)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                    </div>
                    <div v-else class="pt-9"></div>
                </div>
                <div class="bg-gray-800 p-6 rounded text-white xl:text-xl lg:text-lg md:text-md text-base overflow-auto xl:h-[70vh] lg:h-[70vh] md:h-[70vh] h-[50vh] scrollbar-thin scrollbar-thumb-stone-800 scrollbar-track-slate-600">
                    <div>
                        <p class="text-xl font-bold">Ingredients:</p>
                        <div class="pl-4">
                            {{ element.ingredients }}
                        </div>
                    </div>
                    <div class="pt-36">
                        <p class="text-xl font-bold">Directions:</p>
                        <div class="pl-4">
                            {{ element.directions }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div tabindex="-1" class="flex justify-center items-center overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" :class="{'hidden': isDialog}">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Add a Recipe
                    </h3>
                    <button type="button" @click="closeModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="medium-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <div class="space-y-4 md:space-y-6">
                        <div>
                            <label for="recipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recipe</label>
                            <input name="recipe" type="text" v-model="formValues.recipe" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Recipe Name" />
                        </div>
                        <div class="pt-2">
                            <label for="ingredients" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingredients</label>
                            <textarea id="ingredients" name="ingredients" v-model="formValues.ingredients" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="pt-2">
                            <label for="directions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Directions</label>
                            <textarea id="directions" name="directions" v-model="formValues.directions" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div v-if="message" class="alert alert-danger py-4" role="alert">
                            {{ message }}
                        </div><br>
                        <div class="flex justify-end items-center pt-4 px-4 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button @click="handleSave" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <span v-show="loading" class="spinner-border spinner-border-sm"></span>
                                Save
                            </button>
                            <button type="button" @click="closeModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Home',
    data() {
        return {
            datas: [],
            formValues: {},
            element: {},
            isSelect: -1,
            isActive: true,
            isDialog: true,
            isSave: true,
            loading: false,
            message: '',
            role: '',
        };
    },
    created() {
        this.role = JSON.parse(localStorage.getItem('user')).role;
        this.$store.dispatch('admin/getAll').then(
            (response) => {
                if (response.state === "success") {
                    this.datas = response.data;
                }
            },
            (error) => {
                throw error;
            }
        );
    },
    methods: {
        handleUser() {
            this.isActive ? this.isActive = false : this.isActive = true;
        },

        logOut() {
            this.$store.dispatch('auth/logout');
            this.$router.push('/login');
        },

        openModal(id) {
            if(id === -1){
                this.formValues = {};
                this.isSave = true;
            } else if(id > -1) {
                this.formValues = { ...this.element };
                this.isSave = false;
            } else {
                alert("please select item")
                return;
            }
            this.isDialog = false;
        },

        closeModal() {
            this.isDialog = true;
            this.formValues = {};
        },

        handleSave() {
            if (!this.formValues.recipe) {
                alert('Recipe name is required!');
            } else if (!this.formValues.ingredients) {
                alert('Ingredients is required!');
            } else if (!this.formValues.directions) {
                alert('Directions is required!');
            } else {
                this.loading = true;
                if ( this.isSave ) {
                    this.$store.dispatch('admin/add', this.formValues).then(
                        (response) => {
                            if(response.state === "success") {
                                this.isDialog = true;
                                this.datas.push(response.data);
                                this.element = response.data;
                                this.formValues = {};
                                this.isSelect = this.datas.length - 1;
                            }
                        },
                        (error) => {
                            this.loading = false;
                            throw error;
                        }
                    );
                } else {
                    this.$store.dispatch('admin/update', this.formValues ).then(
                        (response) => {
                            if (response.state === "success") {
                                this.isDialog = true;
                                const index = this.datas.findIndex(x => Number(x.id) === Number(this.formValues.id));
                                this.datas[index] = {...response.data};
                                this.element = response.data;
                                this.formValues = {};
                            }
                        },
                        (error) => {
                            this.loading = false;
                            throw error;
                        }
                    );
                }
            }
        },

        deleteItem(id) {
            if ( id ) {
                this.$store.dispatch('admin/delete', id).then(
                    (response) => {
                        if (response.state === "success") {
                            this.isDialog = true;
                            const index = this.datas.findIndex(x => Number(x.id) === Number(id));
                            this.datas.splice(index, 1);
                            this.element = {};
                            this.formValues = {};
                            this.isSelect = -1;
                        }
                    },
                    (error) => {
                        this.loading = false;
                        throw error;
                    }
                );
            } else {
                alert('Please select item');
            }
        },

        itemSelect(data) {
            this.element = data;
            this.isSelect = this.datas.findIndex(x => Number(x.id) === Number(this.element.id));
        },
    },
}
</script>
