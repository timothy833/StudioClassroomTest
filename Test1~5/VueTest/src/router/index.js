import { createRouter, createWebHashHistory } from 'vue-router'
import TestNavbarView from '../views/TestNavbarView.vue'
import Test1View from '@/views/Test1View.vue'
import Test3View from '@/views/Test3View.vue'
import Test2View from '@/views/Test2View.vue'
import Test4View from '@/views/Test4View.vue'
import Test5View from '@/views/Test5View.vue'
const router = createRouter({
  history: createWebHashHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'TestNavbar',
      component: TestNavbarView,
      children:[{
        path: 'Test1',
        name: 'Test1View',
        component: Test1View
      },
      {
        path: 'Test2',
        name: 'Test2View',
        component: Test2View
      },
      {
        path: 'Test3',
        name: 'Test3View',
        component: Test3View
      },
      {
        path: 'Test4',
        name: 'Test4View',
        component: Test4View
      },
      {
        path: 'Test5',
        name: 'Test5View',
        component: Test5View
      }]
    },
  ]
})

export default router
