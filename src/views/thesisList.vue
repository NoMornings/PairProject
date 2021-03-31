<template>
    <div>
        <v-pageheader></v-pageheader>
        <div class="w-wrap">
            <v-thesistable style="margin:10px;"></v-thesistable>
        </div>
    </div>
</template>

<style scoped>
</style>

<script>
import pageHeader from '@/components/pageHeader'
import navMenu from '@/components/navMenu'
import thesisTable from '@/components/thesisTable'

export default {
    components:{
        'v-pageheader':pageHeader,
        'v-navmenu':navMenu,
        'v-thesistable':thesisTable
    }
}
</script>
