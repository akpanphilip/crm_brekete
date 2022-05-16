import Home from "./components/pages/home";
import UserMgt from "./components/pages/user_management";
import Sponsor from "./components/pages/sponsor";
import Driver from "./components/pages/driver";
import Guarantor1_capture from "./components/pages/guarantor1_capture";
import Guarantor2_capture from "./components/pages/guarantor2_capture";
import Login from "./components/auth/login";
import Register from "./components/auth/register";
import Admin from "./components/pages/admin";
import VehicleMgt from "./components/pages/vehicle_management";
import DriverInfo from "./components/pages/driver_info";
import SponsorInfo from "./components/pages/sponsor_info";


export const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
        meta: {requiresAuth: true}
    },
    {
        path: "/user-management",
        name: "UserMgt",
        component: UserMgt,
        meta: {requiresAuth: true}
    },
    {
        path: "/sponsor-capturing",
        name: "Sponsor",
        component: Sponsor,
        meta: {requiresAuth: true}
    },
    {
        path: "/driver-capturing",
        name: "Driver",
        component: Driver,
        meta: {requiresAuth: true}
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
        meta: {guest: true}
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
        meta: {guest: true}
    },
    {
        path: "/guarantor1-capture",
        name: "Guarantor1_capture",
        component: Guarantor1_capture,
        meta: {requiresAuth: true}
    }
    ,
    {
        path: "/guarantor2-capture",
        name: "Guarantor2_capture",
        component: Guarantor2_capture,
        meta: {requiresAuth: true}
    },
    {
        path: "/admin",
        name: "Admin",
        component: Admin,
        meta: {requiresAuth: true}
    },
    {
        path: "/vehicle-management",
        name: "VehicleMgt",
        component: VehicleMgt,
        meta: {requiresAuth: true}
    }
    ,
    {
        path: "/driver-info/:id",
        name: "DriverInfo",
        component: DriverInfo,
        meta: {requiresAuth: true}
    }
    ,{
        path: "/sponsor-info/:id",
        name: "SponsorInfo",
        component: SponsorInfo,
        meta: {requiresAuth: true}
    }
];
