<template>
  <div>
        <el-menu
          :default-active="activeIndex"
          class="el-menu-demo"
          mode="horizontal"
          @select="handleSelect"
          background-color="#545c64"
          text-color="#fff"
          active-text-color="#ffd04b">
          <el-menu-item index="1" @click="jumpSearch()">论文检索</el-menu-item>
          <el-menu-item index="2" @click="jumpTrend()">论文分析</el-menu-item>
          <el-menu-item index="3" @click="jumpKeyword()">热门领域</el-menu-item>
          <el-menu-item index="4" @click="jumpLogin()">个人中心</el-menu-item>
        </el-menu>
  </div>
</template>


<script>
  export default {
    data() {
      return {
        activeIndex: '1'
      };
    },
    methods: {
      handleSelect(key, keyPath) {
        console.log(key, keyPath);
      },
      jumpSearch:function(){
        this.activeIndex='1';
        this.$router.push('/thesisSearch');
      },
      jumpTrend:function(){
        this.activeIndex='2';
        this.$router.push('/tableTrend');
      },
      jumpKeyword:function(){
        this.activeIndex='3';
        this.$router.push('/tableKeyword');
      },
      jumpLogin:function(){
        this.activeIndex='4';
      }
    }
  }
</script>