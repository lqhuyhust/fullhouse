<script setup>
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';

let form = ref({
    current_password: '',
    new_password: '',
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
});

const savePassword = () => {
    const formData = new FormData();
    formData.append('current_password', form.value.current_password);
    formData.append('new_password', form.value.new_password);

    axios.post(`/api/users/change-password/${props.id}`, formData)
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
                    <h1>Create New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <router-link :to="{ name: 'admin' }">Dashboard</router-link>
                        <router-link :to="{ name: 'admin-users' }">Users</router-link>
                        <li class="breadcrumb-item active">Create New User</li>
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
                                <label for="inputCurrentPassword">Current Password</label>
                                <input type="password" id="inputCurrentPassword" name="password" class="form-control"
                                    v-model="form.current_password">
                            </div>
                            <div class="form-group">
                                <label for="inputNewPassword">New Password</label>
                                <input type="password" id="inputNewPassword" name="password" class="form-control"
                                    v-model="form.new_password">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <router-link :to="{ name: 'admin-users' }"
                                        class="btn btn-secondary">Cancel</router-link>
                                    <button class="btn btn-success float-right" @click="savePassword()">Save
                                        Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>