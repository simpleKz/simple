import VueRouter from 'vue-router';

import ProfileComponent from '../components/profile/ProfileComponent'
import CoursesComponent from "../components/courses/CoursesComponent";
import SingleCourseComponent from "../components/courses/SingleCourseComponent";
import ProfitComponent from "../components/profit/ProfitComponent";
import SettingsComponent from "../components/settings/SettingsComponent";
import SupportComponent from "../components/support/SupportComponent";
import WithdrawalComponent from "../components/withdrawal/WithdrawalComponent";






window.Vue = require('vue');

window.Vue.use(VueRouter);


var router = new VueRouter({
    routes: [
        {
            path: '/',
            redirect: 'profile',
            props: true,
        },
        {
            path: '/profile',
            component: ProfileComponent,
            props: true,
            name: 'profile'
        },
        {
            path: '/courses',
            component: CoursesComponent,
            props: true,
            name: 'courses'
        },
        {
            path: '/course/{id}',
            component: SingleCourseComponent,
            props: true,
            name: 'course'
        },
        {
            path: '/profit',
            component: ProfitComponent,
            props: true,
            name: 'profit'
        },
        {
            path: '/settings',
            component: SettingsComponent,
            props: true,
            name: 'settings'
        },
        {
            path: '/support',
            component: SupportComponent,
            props: true,
            name: 'support'
        },
        {
            path: '/withdrawal',
            component: WithdrawalComponent,
            props: true,
            name: 'withdrawal'
        }

    ]
});
export default router
