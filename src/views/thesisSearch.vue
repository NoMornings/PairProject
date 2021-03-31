<template>
    <div>
        <!-- <v-pageheader></v-pageheader> -->
        <div class="w-wrap">
            <!-- <v-search style="width:100px;margin:10px;"></v-search> -->
            <!-- <v-thesistable style="margin:10px;"></v-thesistable> -->
            <v-thesistablescale style="margin:10px;"></v-thesistablescale>
        </div>
    </div>
</template>

<style scoped>
</style>

<script>
import pageHeader from '@/components/pageHeader'
import navMenu from '@/components/navMenu'
import thesisTable from '@/components/thesisTable'
import thesistableScale from '@/components/thesisTableScale'
import search from '@/components/search'

export default {
    components:{
        'v-pageheader':pageHeader,
        'v-navmenu':navMenu,
        'v-thesistable':thesisTable,
        'v-thesistablescale':thesistableScale,
        'v-search':search
    }
}
</script>
