import CompanyProfilePage from './components/companyProfile/CompanyProfilePage.vue'
export const routes = [
    {
        path: "/",
        name: "company",
        component: CompanyProfilePage
    },
    // {
    //     path: "/unauthorized",
    //     name: 'unauthorized',
    //     component: () => import('./components/adminPanel/Unauthorized.vue')
    // },
    {
        path: "/login",
        name: 'login',
        component: () => import('./components/adminPanel/Login.vue')
    },
    // admin
    {
        path: '/admin-dashboard',
        name: 'admin-dashboard',
        component: () => import('./components/adminPanel/admin/Dashboard.vue')
    }, 
    {
        path: '/admin-about',
        name: 'admin-about',
        component: () => import('./components/adminPanel/admin/About.vue')
    }, 
    {
        path: '/admin-visi-misi',
        name: 'admin-visi-misi',
        component: () => import('./components/adminPanel/admin/VisiMisi.vue')
    }, 
]