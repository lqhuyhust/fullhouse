<script setup>
import { onMounted, ref } from 'vue';

let users = ref([]);

onMounted(async () => {
    getUsers()
});

const getUsers = async () => {
    let response = await axios.get('/api/users');
    users.value = response.data.users;
    console.log('users: ', users.value);
}

const onDelete = (id) => {
    Swal.fire({
        title: 'Delete user!',
        text: 'Are you want to delete this user?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'OK'
    })
        .then((result) => {
            if (result.value) {
                axios.delete(`/api/users/delete/${id}`)
                    .then((response) => {
                        console.log(response);
                        if (response.data.status_code == 200) {
                            toast.fire({
                                icon: "success",
                                title: response.data.message,
                            })
                            getUsers()
                        }

                        if (response.data.status_code == 404) {
                            toast.fire({
                                icon: "danger",
                                title: response.data.message,
                            })
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            }
        })

}
</script>

<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <router-link :to="{ name: 'admin' }">Dashboard</router-link>
                    </ol>
                </div>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <router-link :to="{ name: 'admin-users-create' }" class="btn btn-danger">Create New User</router-link>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users DataTable with default features</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody v-for="user in users" :key="user.id" v-if="users.length > 0">
                                    <tr>
                                        <td>{{ user.id }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.phone_number }}</td>
                                        <td class="user-actions text-right">
                                            <router-link :to="{ name: 'admin-users-edit', params: { id: user.id } }"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                                Edit
                                            </router-link>
                                            <button class="delete btn btn-danger btn-sm" href="#" @click="onDelete(user.id)"
                                                data="{{user.id}}">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <div v-else>
                                    <h3>User not found</h3>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>