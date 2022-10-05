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
                    <div class="flex items-center">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                    </div>
                </div>
                <div class="block menu rounded-box bg-gray-800 p-6 rounded text-white overflow-auto xl:h-[70vh] lg:h-[70vh] md:h-[70vh] h-[50vh] scrollbar-thin scrollbar-thumb-stone-800 scrollbar-track-slate-600">
                    <p class="recipe-list my-1 px-4 py-2 rounded-md xl:text-2xl lg:text-xl text-lg">
                    </p>
                </div>
            </div>
            <div class="xl:w-3/4 lg:w-3/4 md:w-3/4 w-full mr-4 xl:pt-0 lg:pt-0 md:pt-0 pt-4">
                <div class="flex justify-between py-2">
                    <p class="text-white xl:text-3xl lg:text-2xl md:text-xl sm:text-lg text-md"></p>
                    <div class="flex items-center">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-1">Delete</button>
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                    </div>
                </div>
                <div class="bg-gray-800 p-6 rounded text-white xl:text-xl lg:text-lg md:text-md text-base overflow-auto xl:h-[70vh] lg:h-[70vh] md:h-[70vh] h-[50vh] scrollbar-thin scrollbar-thumb-stone-800 scrollbar-track-slate-600">
                    <div>
                        <p class="text-xl font-bold">Ingredients:</p>
                        <div class="pl-4">
                        </div>
                    </div>
                    <div class="pt-36">
                        <p class="text-xl font-bold">Directions:</p>
                        <div class="pl-4">
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
            isActive: true,
            loading: false,
            message: '',
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
    },
}
</script>

