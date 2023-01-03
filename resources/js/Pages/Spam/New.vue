<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { useForm , Link} from '@inertiajs/inertia-vue3';


const form = useForm({
    source: null,
    state: null,
    report_type: null,
    report_id: null,
    user_id: null,
    referenceResourceType: null,
      });

function reportSpam() {
      form.post('/spam',{   });
    }
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reported New Spam
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form class="bg-white  p-4  w-64 " @submit.prevent="reportSpam">
                         <div class="mt-4">
                           <label for="source" class="block mb-2 text-sm font-medium text-gray-900 ">Spam source</label>
                           <input type="text"  name="source" v-model="form.source"   class="border-gray-400 rounded w-full" placeholder="" >
                         </div>

                         <div class="mt-4">
                           <label for="state" class="block mb-2 text-sm font-medium text-gray-900 ">Spam sate</label>
                           <input type="text"  name="state" v-model="form.state"   class="border-gray-400 rounded w-full" placeholder="" >
                         </div>

                         <div class="mt-4">
                           <label for="report_type" class="block mb-2 text-sm font-medium text-gray-900 ">Spam report type</label>
                           <input type="text"  name="report_type" v-model="form.report_type"   class="border-gray-400 rounded w-full" placeholder="" >
                         </div>

                         <div class="mt-4">
                           <label for="referenceResourceType" class="block mb-2 text-sm font-medium text-gray-900 ">Spam report reference  type</label>
                           <input type="text"  name="referenceResourceType" v-model="form.referenceResourceType"   class="border-gray-400 rounded w-full" placeholder="" >
                         </div>

                        <div class="mb-6 mt-4">
                          <button class="rounded bg-blue-600 p-3 text-white"  type="submit" :disabled="form.processing">Report Spam</button>
                         </div>
                     </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
