<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import InputLabel from '@/Components/InputLabel.vue'
import SelectInput from '@/Components/SelectInput.vue'
import DataTable from 'datatables.net-vue3'
import 'datatables.net-dt/css/jquery.dataTables.css'
import ButtonsHTML5 from 'datatables.net-buttons/js/buttons.html5'
import 'datatables.net-buttons/js/buttons.print'
import 'datatables.net-responsive-dt'
import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css'
import JsZip from 'jszip'
import pdfmake from "pdfmake/build/pdfmake"
import * as pdfFonts from "pdfmake/build/vfs_fonts";
pdfmake.vfs = pdfFonts.pdfMake ? pdfFonts.pdfMake.vfs : pdfmake.vfs;
window.JSZip = JsZip;
DataTable.use(ButtonsHTML5);

const props = defineProps({
    employees:{type:Object},
    departments:{type:Object}
});

const columns1 = ref([]);
const columns2 = ref([]);
const buttons1 = ref([]);
const buttons2 = ref([]);
const report = ref('1');
const types = ref([{'id':'1','name':'Employees'},{'id':'2','name':'Departments'}]);

columns1.value = [{data:null,render:function (data,type,row,meta)
    {return (meta.row + 1)}},
    {data:'name'},
    {data:'email'},
    {data:'phone'},
    {data:'department'},
]
columns2.value = [{data:null,render:function (data,type,row,meta)
    {return (meta.row + 1)}},
    {data:'name'}
]
buttons1.value = [
    {
        title:'Employees',
        extend:'excelHtml5',
        text:'<i class="fa-solid fa-file-excel"></i> Excel',
        className:'px-4 py-2 bg-green-600 text-white border rounded-md font-semibold text-xs hover:bg-green-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150'
    },
    {
        title:'Employees',
        extend:'pdfHtml5',
        text:'<i class="fa-solid fa-file-pdf"></i> PDF',
        className:'px-4 py-2 bg-blue-400 text-white border rounded-md font-semibold text-xs hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150'
    },
    {
        title:'Employees',
        extend:'print',
        text:'<i class="fa-solid fa-print"></i> печать',
        className:'px-4 py-2 bg-white border border-gray-500 rounded-md font-semibold text-xs text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'
    },
    {
        title:'Employees',
        extend:'copy',
        text:'<i class="fa-solid fa-copy"></i> копировать',
        className:'px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'
    }
]
buttons2.value = [
    {
        title:'Department',
        extend:'excelHtml5',
        text:'<i class="fa-solid fa-file-excel"></i> Excel',
        className:'px-4 py-2 bg-green-600 text-white border rounded-md font-semibold text-xs hover:bg-green-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150'
    },
    {
        title:'Department',
        extend:'pdfHtml5',
        text:'<i class="fa-solid fa-file-pdf"></i> PDF',
        className:'px-4 py-2 bg-blue-400 text-white border rounded-md font-semibold text-xs hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150'
    },
    {
        title:'Department',
        extend:'print',
        text:'<i class="fa-solid fa-print"></i> печать',
        className:'px-4 py-2 bg-white border border-gray-500 rounded-md font-semibold text-xs text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'
    },
    {
        title:'Department',
        extend:'copy',
        text:'<i class="fa-solid fa-copy"></i> копировать',
        className:'px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'
    }
]

</script>

<template>
    <Head title="Reports" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">Отчёты</h2>
        </template>

        <div class="py-1">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="px-3 py-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <InputLabel for="rep" Value="Отчёт:"></InputLabel>
                    <SelectInput id="rep"
                                 class="mx-auto my-1 block w-1/2"
                                 v-model="report"
                                 :options="types"></SelectInput>
                </div>
                <div v-if="report == '1'"
                     class="px-3 py-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <DataTable :data="employees"
                               :columns="columns1"
                               class="w-full border border-gray-400 mt-2"
                               :options="{responsive:true,autoWidth:false,dom:'Bfrtip',buttons:buttons1}">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-2 py-2">№</th>
                            <th class="px-2 py-2">Имя</th>
                            <th class="px-2 py-2">Email</th>
                            <th class="px-2 py-2">Телефон</th>
                            <th class="px-2 py-2">Департамент</th>
                        </tr>
                        </thead>
                    </DataTable>
                </div>
                <div v-else
                     class="px-3 py-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <DataTable :data="departments"
                               :columns="columns2"
                               class="w-full border border-gray-400"
                               :options="{responsive:true,autoWidth:false,dom:'Bfrtip',buttons:buttons1}">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-2 py-2">№</th>
                            <th class="px-2 py-2">Департамент</th>
                        </tr>
                        </thead>
                    </DataTable>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
