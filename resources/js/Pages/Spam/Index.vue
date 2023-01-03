<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm , Link} from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    all_report: Array,

});

const form = useForm({
    report_id: null,
    value: null,
});

function reportSpamUpsdate() {
      Inertia.post(`/spam/${form.report_id}`, {
      _method: 'put',
      report_id: form.report_id,
      value: form.value,
})}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reported Spam
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">


<p class="font-bold text-lg text-center">
    All reports
</p>
                    <div v-if="$page.props.all_report" class="w-full">
                <div v-if="$page.props.all_report.length > 0">
                    <div v-for="spam in $page.props.all_report" class="p-3 bg-gray-100 mt-2  rounded  hover:bg-gray-200 flex justify-between">
                        <div class="w-8/12">
                            <div class="flex ">
                                <p class="p-3">  ID : {{ spam.report_id}} </p>
                                <p class="p-3">  State: {{ spam.state}}</p>
                            </div>
                            <div class="flex ">
                            <p class="p-3"> Type: {{ spam.report_type}}</p>
                            <p class="p-3">  Message: {{ spam.message }}</p>
                            </div>
                        </div>

                       <div class="w-4/12 p-5">
                         <form  @submit.prevent="reportSpamUpsdate">
                            <button @mouseover="form.report_id = spam.report_id; form.value= 1;" class="bg-gray-600 text-white p-3 rounded w-32">
                             Block
                          </button>
                         </form>
                         <form @submit.prevent="reportSpamUpsdate" class="mt-3">
                            <button @mouseover="form.report_id = spam.report_id; form.value= 2;" class="bg-gray-600 text-white p-3 rounded w-32">
                              Resolve
                          </button>
                         </form>

                       </div>

                    </div>
                </div>
                <div v-else>
                    <h1 class="text-center text-xl font-semibold bg-gray-200 rounded mt-2 p-2">
                        You have no seported spam !</h1>
                </div>
            </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
