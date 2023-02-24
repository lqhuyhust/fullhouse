<script setup>
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';

let form = ref({
    id: '',
    name: '',
    phone_number: '',
    email: '',
})

const router = useRouter();

onMounted(async () => {
    getOneUser()
});

const props = defineProps({
    id: {
        type: String,
        default: ''
    }
})

const getOneUser = async () => {
    let response = await axios.get(`/api/users/${props.id}`);
    form.value = response.data.data;
}

const updateUser = () => {
    const formData = new FormData();
    formData.append('name', form.value.name);
    formData.append('phone_number', form.value.phone_number);
    formData.append('email', form.value.email);

    axios.post(`/api/users/edit/${props.id}`, formData)
        .then((response) => {
            router.push({ name: 'admin-users' });
            console.log(response.data.message);
            toast.fire({
                icon: "success",
                title: response.data.message,
            })
        })
        .catch((error) => {
            console.log(error.response);
        })
}
</script>
<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ form.name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <router-link :to="{ name: 'admin' }">Dashboard</router-link>
                        <router-link :to="{ name: 'admin-users' }">Users</router-link>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" name="name" class="form-control" v-model="form.name">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="text" id="inputEmail" name="email" class="form-control" v-model="form.email">
                            </div>
                            <div class="form-group">
                                <label for="inputPhoneNumber">Phone Number</label>
                                <input type="text" id="inputPhoneNumber" name="phone_number" class="form-control"
                                    v-model="form.phone_number">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <router-link :to="{ name: 'admin-users' }"
                                        class="btn btn-secondary">Cancel</router-link>
                                    <router-link class="btn btn-primary"
                                        :to="{ name: 'admin-users-change-password', params: { id: props.id } }">Change
                                        Password</router-link>
                                    <button class="btn btn-success float-right" @click="updateUser()">Update
                                        User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>