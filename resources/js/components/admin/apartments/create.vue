<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

let form = ref({
    id: '',
    title: '',
    address: '',
    description: '',
    price: '',
    deposit: '',
    owner_name: '',
    owner_phone_numner: '',
    owner_email: '',
    area: '',
    images: ''
});

const router = useRouter();

const updatePhoto = (e) => {
    let file = e.target.files[0];
    let reader = new FileReader();
    let limit = 1024 * 1024 * 2;
    if (file['size'] > limit) {
        return false;
    }
    reader.onload = (e) => {
        $('#preview-image-before-upload').attr('src', e.target.result);
    }
    form.value.images = file;
    reader.readAsDataURL(file);
}

const saveApartment = () => {
    const formData = new FormData();
    formData.append('title', form.value.title);
    formData.append('address', form.value.address);
    formData.append('area', form.value.area);
    formData.append('description', form.value.description);
    formData.append('price', form.value.price);
    formData.append('deposit', form.value.deposit);
    formData.append('owner_name', form.value.owner_name);
    formData.append('owner_phone_number', form.value.owner_phone_numner);
    formData.append('owner_email', form.value.owner_email);
    formData.append('images', form.value.images);

    axios.post('/api/apartments/create', formData)
        .then((response) => {
            router.push({ name: 'admin-apartments' });
            console.log(response);
            toast.fire({
                icon: "success",
                title: response.data.message,
            })
        })
        .catch((error) => {
            console.log(error);
        })
}

</script>

<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Apartment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <router-link :to="{ name: 'admin' }">Dashboard</router-link>
                        <router-link :to="{ name: 'admin-apartments' }">Apartments</router-link>
                        <li class="breadcrumb-item active">Create New Apartment</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" id="inputTitle" name="title" class="form-control" v-model="form.title">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" id="inputAddress" name="address" class="form-control" v-model="form.address">
                        </div>
                        <div class="form-group">
                            <label for="inputArea">Area</label>
                            <input type="text" id="inputArea" name="area" class="form-control" v-model="form.area">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea id="inputDescription" name="description" class="form-control"
                                v-model="form.description" row="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Price</label>
                            <input type="text" id="inputPrice" name="price" class="form-control" v-model="form.price">
                        </div>
                        <div class="form-group">
                            <label for="inputDeposit">Deposit</label>
                            <input type="text" id="inputDeposit" name="deposit" class="form-control" v-model="form.deposit">
                        </div>
                        <div class="form-group">
                            <label for="inputOwnerName">Owner Name</label>
                            <input type="text" id="inputOwnerName" name="owner_name" class="form-control"
                                v-model="form.owner_name">
                        </div>
                        <div class="form-group">
                            <label for="inputOwnerPhoneNumber">Owner Phone Number</label>
                            <input type="text" id="inputOwnerPhoneNumber" name="owner_phone_number" class="form-control"
                                v-model="form.owner_phone_numner">
                        </div>
                        <div class="form-group">
                            <label for="inputOwnerEmail">Owner Email</label>
                            <input type="text" id="inputOwnerEmail" name="owner_email" class="form-control"
                                v-model="form.owner_email">
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" id="images" name="images" style="display: none;" @change="updatePhoto" />
                            <input type="button" class="form-control btn-primary" value="Choose a picture"
                                onclick="document.getElementById('images').click();" style="width:20%;" />
                            <div class="photo-preview mt-3" v-if="form.images">
                                <img id="preview-image-before-upload" src="" alt="preview image" style="max-height: 500px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <router-link :to="{ name: 'admin-apartments' }"
                                    class="btn btn-secondary">Cancel</router-link>
                                <button class="btn btn-success float-right" @click="saveApartment()">Create New
                                    Apartment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>