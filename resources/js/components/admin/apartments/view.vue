<script setup>
import { onMounted, ref } from 'vue';

let apartment = ref({
    id: '',
    title: '',
    address: '',
    description: '',
    price: '',
    deposit: '',
    owner_name: '',
    owner_phone_numner: '',
    owner_email: '',
    status: '',
    area: '',
    images: ''
})

let photoUrl = ref()

onMounted(async () => {
    getOneApartment()
});

const props = defineProps({
    id: {
        type: String,
        default: ''
    }
})

const getOneApartment = async () => {
    let response = await axios.get(`/api/apartments/${props.id}`);
    apartment.value = response.data.apartment;
    photoUrl = 'http://localhost:8000/' + response.data.apartment.images
}

</script>
<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ apartment.title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <router-link :to="{ name: 'admin' }">Dashboard</router-link>
                        <router-link :to="{ name: 'admin-apartments' }">Apartments</router-link>
                        <li class="breadcrumb-item active">View Apartment</li>
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
                            <h3 class="card-title">Apartment {{ apartment.title }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div><strong>Title</strong></div>
                                <div>{{ apartment.title }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Address</strong></div>
                                <div>{{ apartment.address }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Description</strong></div>
                                <div>{{ apartment.description }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Price</strong></div>
                                <div>{{ apartment.price }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Deposit</strong></div>
                                <div>{{ apartment.deposit }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Owner Name</strong></div>
                                <div>{{ apartment.owner_name }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Owner Phone Number</strong></div>
                                <div>{{ apartment.owner_phone_number }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Owner Email</strong></div>
                                <div>{{ apartment.owner_email }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Images</strong></div>
                                <div>
                                    <img id="preview-image-before-upload" :src="photoUrl" alt="preview image"
                                        style="max-height: 500px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <router-link :to="{ name: 'admin-apartments' }"
                                        class="btn btn-secondary">Back</router-link>
                                    <router-link v-if="apartment.id"
                                        :to="{ name: 'admin-apartments-edit', params: { id: apartment.id } }"
                                        class="btn btn-primary">
                                        Edit Apartment
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>