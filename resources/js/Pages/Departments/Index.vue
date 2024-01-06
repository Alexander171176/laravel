<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import DangerButton from '@/Components/DangerButton.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import Swal from 'sweetalert2'

const props = defineProps({
    departments: {type:Object}
});
const form = useForm({
    id:''
});
const deleteDepartment = (id,name) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title:'Вы действительно хотите удалить '+name+' ?',
        icon:'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Да, удалить',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Отмена'
    }).then((result) => {
        if(result.isConfirmed) {
            form.delete(route('departments.destroy',id));
        }
    });
}
</script>

<template>
    <Head title="Departments" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">Департаменты</h2>
        </template>

        <div class="py-1">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('departments.create')"
                          :class="'px-4 py-2 bg-green-600 text-white border rounded-md font-semibold text-xs hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150'" >
                    <i class="fa-solid fa-plus-circle mr-1"></i> Добавить
                    </Link>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-2 py-2">№</th>
                            <th class="px-2 py-2">Департамент</th>
                            <th class="px-2 py-2"></th>
                            <th class="px-2 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dep, i in departments" :key="dep.id">
                        <td class="border border-gray-400 px-2 py-2">{{ (i+1) }}</td>
                        <td class="border border-gray-400 px-2 py-2">{{ dep.name }}</td>
                        <td class="border border-gray-400 px-2 py-2">
                            <Link :href="route('departments.edit',dep.id)"
                                  :class="'px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150'" >
                                <i class="fa-solid fa-edit"></i> Редактировать
                            </Link>
                        </td>
                        <td class="border border-gray-400 px-2 py-2">
                            <DangerButton @click="$event => deleteDepartment(dep.id,dep.name)">
                                <i class="fa-solid fa-trash mr-1"></i> Удалить
                            </DangerButton>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
