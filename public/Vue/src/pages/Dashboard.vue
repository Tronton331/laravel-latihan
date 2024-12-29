<template>
    <div class="container-lg mt-5">
        <!-- Header -->
        <h1>Hi Admin!</h1>
        <!-- Content -->
        <div class="mt-3 position-relative">
            <!-- Add button -->
            <div class="position-absolute end-0 me-2">
                <button class="btn btn-primary btn-sm" style="width: 5em;" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi-plus"></i>
                    <span class="ms-1">Add</span>
                </button>
            </div>
            <!-- Table of Content -->
            <table class="table table-striped table-hover">
                <!-- [Table] Head -->
                <thead>
                    <tr>
                        <th scope="col" style="width: 3em;">No</th>
                        <th scope="col">Soal</th>
                        <th scope="col" style="width: 12rem;"></th>
                    </tr>
                </thead>
                <!-- [Table] Body -->
                <tbody>
                    <!-- looping content from backend -->
                    <tr v-for="(data, index) in quetions" :key="data.id">
                        <td scope="row" class="text-end">{{ index + 1 }}</td>
                        <td>{{ data.question }}</td>
                        <td class="d-flex">
                            <button class="ms-1 mb-1 btn btn-primary btn-sm d-flex align-items-center w-1" style="width: 6em;" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="bi-pencil"></i>
                                <span class="ms-1">Edit</span>
                            </button>
                            <button class="ms-1 mb-1 btn btn-primary btn-sm d-flex align-items-center w-1" style="width: 6em;" data-bs-toggle="modal" data-bs-target="#removeModal">
                                <i class="bi-trash"></i>
                                <span class="ms-1">Delete</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Modal (Like pop up) -->
        <!-- Add quetion -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <form @submit.prevent="addNewQuetion">
                    <div class="modal-content">
                        <div class="modal-header text-bg-primary">
                            <h5 class="modal-title">Tambah Soal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-content">
                            <div class="m-4 row">
                                <label for="quetionName" class="col-3 form-label">Pertanyaan</label>
                                <input type="text" id="quetionName" class="col form-control form-control-sm" v-model="quetionForm.name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm" style="width: 4em;">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Edit quetion -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <form @submit.prevent="editQuetion">
                    <div class="modal-content">
                        <div class="modal-header text-bg-primary">
                            <h5 class="modal-title">Edit Soal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-content">
                            <div class="m-4 row">
                                <!-- todo: Make readonly form have value from quetion data where edit button pressed -->
                                <div class="mb-3 row">
                                    <label for="quetionNameBefore" class="col-3 form-label">From</label>
                                    <input type="text" id="quetionNameBefore" class="col form-control form-control-sm" disabled readonly>
                                </div>
                                <div class="row">
                                    <label for="quetionNameAfter" class="col-3 form-label">To</label>
                                    <input type="text" id="quetionNameAfter" class="col form-control form-control-sm" v-model="quetionForm.name">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm" style="width: 4em;">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Remove quetion -->
        <div class="modal fade" id="removeModal" data-bs-backdrop="static">
            <div class="modal-dialog">
                <form @submit.prevent="removeQuetion">
                    <div class="modal-content">
                        <div class="modal-header text-bg-danger">
                            <h5 class="modal-title">Hapus Soal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-content">
                            <div class="m-4">
                                <p>Kamu yakin ingin menghapus soal ini?</p>
                                <input type="text" class="col form-control form-control-sm" :value="quetions.question" disabled readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-sm" style="width: 4em;">Ya</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="width: 4em;">Tidak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import useQuetions from '../stores/quetionStore';

    const quetionForm = ref(
    {
        name: ''
    });

    // add new quetion
    const addNewQuetion = () =>
    {
        window.location.reload();
    }

    // add new quetion
    const editQuetion = () =>
    {
        window.location.reload();
    }

    // add new quetion
    const removeQuetion = () =>
    {
        window.location.reload();
    }

    // show quetions from backend
    const {quetions, getQuetions} = useQuetions();
    onMounted(() => getQuetions());

</script>
