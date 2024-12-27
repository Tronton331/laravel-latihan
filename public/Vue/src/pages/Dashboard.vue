<template>
    <div class="container-lg mt-5">
            <h1>Hi Admin!</h1>
        <div class="mt-3">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="width: 3em;">No</th>
                        <th scope="col">Soal</th>
                        <th scope="col" style="width: 12rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in items" :key="index">
                        <td scope="row" class="text-end">{{ index + 1 }}</td>
                        <td>{{ item.message }}</td>
                        <td class="d-flex">
                            <button class="ms-1 mb-1 btn btn-primary btn-sm d-flex align-items-center w-1" style="width: 6em;"><i class="bi-trash"></i><span class="ms-1">Delete</span></button>
                            <button class="ms-1 mb-1 btn btn-primary btn-sm d-flex align-items-center w-1" style="width: 6em;"><i class="bi-pencil"></i><span class="ms-1">Edit</span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue';

    const quetion = ref()

    const items = ref([{ message: 'Foo' }, { message: 'Bar' }, { message: 'Bar' }, { message: 'Bar' }, { message: 'Bar' }, { message: 'Bar' }])
</script>
