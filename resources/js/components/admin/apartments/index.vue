<script setup>
import { onMounted, ref } from 'vue';

let apartments = ref([]);

onMounted(async () => {
    getApartments()
});

const getApartments = async () => {
    let response = await axios.get('/api/apartments');
    apartments.value = response.data.apartments;
    console.log('apartments: ', apartments.value);
}

const onDelete = (id) => {
    Swal.fire({
        title: 'Delete apartment!',
        text: 'Are you want to delete this apartment?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'OK'
    })
        .then((result) => {
            if (result.value) {
                axios.delete(`/api/apartments/delete/${id}`)
                    .then((response) => {
                        console.log(response);
                        if (response.data.status_code == 200) {
                            toast.fire({
                                icon: "success",
                                title: response.data.message,
                            })
                            getApartments()
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
                    <h1>Apartments Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <router-link :to="{ name: 'admin' }">Dashboard</router-link>
                        <li class="breadcrumb-item active">Apartments</li>
                    </ol>
                </div>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <router-link :to="{ name: 'admin-apartments-create' }" class="btn btn-danger">Create a new
                        Apartment</router-link>
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
                            <h3 class="card-title">Apartments DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Address</th>
                                        <th>Price</th>
                                        <th>Deposit</th>
                                        <th>Owner Name</th>
                                        <th>Owner Phone Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody v-for="apartment in apartments" :key="apartment.id" v-if="apartments.length > 0">
                                    <tr>
                                        <td>{{ apartment.id }}</td>
                                        <td>{{ apartment.title }}</td>
                                        <td>{{ apartment.address }}</td>
                                        <td>{{ apartment.price }}</td>
                                        <td>{{ apartment.deposit }}</td>
                                        <td>{{ apartment.owner_name }}</td>
                                        <td>{{ apartment.owner_phone_number }}</td>
                                        <td class="apartment-actions text-right">
                                            <router-link
                                                :to="{ name: 'admin-apartments-view', params: { id: apartment.id } }"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-folder"></i>
                                                View
                                            </router-link>
                                            <router-link
                                                :to="{ name: 'admin-apartments-edit', params: { id: apartment.id } }"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                                Edit
                                            </router-link>
                                            <button class="delete btn btn-danger btn-sm" href="#"
                                                @click="onDelete(apartment.id)" data="{{apartment.id}}">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <div v-else>
                                    <h3>Apartment not found</h3>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>