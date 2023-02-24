import { createRouter, createWebHistory } from "vue-router";
import admin from "./admin";

const routes = [...admin];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router;