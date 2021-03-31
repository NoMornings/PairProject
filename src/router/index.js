import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'


//views
import index from '@/views/index'
import thesisList from '@/views/thesisList'
import thesisSearch from '@/views/thesisSearch'

//components
import pageHeader from '@/components/pageHeader'
import navMenu from '@/components/navMenu'

//table
import tableHot from '@/components/tableHot'
import tableKeyword from '@/components/tableKeyword'
import tableTrend from '@/components/tableTrend'


Vue.use(Router)



export default new Router({
  routes: [
    {
      path: '/HelloWorld',
      name: 'HelloWorld',
      component: HelloWorld
    },
  
    //views
    //首页
    {
      path: '/',
      redirect: '/',
      name: 'index',
      meta:{title:"首页"},
      component: index,
      children:[
        //论文搜索
        {
          path: 'thesisSearch',
          name: 'thesisSearch',
          component: thesisSearch
        },
        //论文分析
        {
          path: 'tableTrend',
          name: 'tableTrend',
          component: tableTrend
        },
        //热门领域
        {
          path: 'tableKeyword',
          name: 'tableKeyword',
          component: tableKeyword
        }
      ]
    },
    //论文列表
    {
      path: '/thesisList',
      name: 'thesisList',
      component: thesisList
    },
    
    //components
    //页头
    {
      path: '/pageHeader',
      name: 'pageHeader',
      component: pageHeader
    },
    //导航栏
    {
      path: '/navMenu',
      name: 'navMenu',
      component: navMenu
    },
    //图表
    {
      path: '/tableHot',
      name: 'tableHot',
      component: tableHot
    }

  ]
})
