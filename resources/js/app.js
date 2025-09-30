import "./bootstrap";
import "@fortawesome/fontawesome-free/css/all.min.css";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Toggle Sidebar on Mobile
document.getElementById("hamburger").addEventListener("click", function () {
    document.querySelector(".sidebar").classList.add("active");
});

// Close Sidebar on Mobile
document.getElementById("closeSidebar").addEventListener("click", function () {
    document.querySelector(".sidebar").classList.remove("active");
});

// Close sidebar when clicking outside on mobile
document.addEventListener("click", function (event) {
    const sidebar = document.querySelector(".sidebar");
    const hamburger = document.getElementById("hamburger");

    if (
        window.innerWidth <= 768 &&
        !sidebar.contains(event.target) &&
        !hamburger.contains(event.target) &&
        sidebar.classList.contains("active")
    ) {
        sidebar.classList.remove("active");
    }
});

// Toggle Dark Mode
const darkModeToggle = document.getElementById("darkModeToggle");
const toggleThumb = document.getElementById("toggleThumb");

if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
    toggleThumb.style.transform = "translateX(150%)";
} else {
    document.documentElement.classList.remove("dark");
    toggleThumb.style.transform = "translateX(0)";
}

darkModeToggle.addEventListener("click", function () {
    document.documentElement.classList.toggle("dark");

    if (document.documentElement.classList.contains("dark")) {
        localStorage.theme = "dark";
        toggleThumb.style.transform = "translateX(150%)";
    } else {
        localStorage.theme = "light";
        toggleThumb.style.transform = "translateX(0)";
    }

    updateChartThemes();
});

// Initialize Charts
let revenueChart, userChart;

function initCharts() {
    const revenueCtx = document.getElementById("revenueChart").getContext("2d");
    revenueChart = new Chart(revenueCtx, {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [
                {
                    label: "Revenue",
                    data: [
                        12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000,
                        30000, 40000, 38000, 45000,
                    ],
                    borderColor: "#00d9ff",
                    backgroundColor: "rgba(0, 217, 255, 0.1)",
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "#fff"
                            : "#374151",
                    },
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "rgba(255, 255, 255, 0.1)"
                            : "rgba(0, 0, 0, 0.1)",
                    },
                    ticks: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "#fff"
                            : "#374151",
                    },
                },
                x: {
                    grid: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "rgba(255, 255, 255, 0.1)"
                            : "rgba(0, 0, 0, 0.1)",
                    },
                    ticks: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "#fff"
                            : "#374151",
                    },
                },
            },
        },
    });

    const userCtx = document.getElementById("userChart").getContext("2d");
    userChart = new Chart(userCtx, {
        type: "bar",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [
                {
                    label: "New Users",
                    data: [
                        850, 1100, 950, 1400, 1200, 1600, 1500, 1800, 1700,
                        2000, 1900, 2200,
                    ],
                    backgroundColor: "#a855f7",
                    borderColor: "#a855f7",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "#fff"
                            : "#374151",
                    },
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "rgba(255, 255, 255, 0.1)"
                            : "rgba(0, 0, 0, 0.1)",
                    },
                    ticks: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "#fff"
                            : "#374151",
                    },
                },
                x: {
                    grid: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "rgba(255, 255, 255, 0.1)"
                            : "rgba(0, 0, 0, 0.1)",
                    },
                    ticks: {
                        color: document.documentElement.classList.contains(
                            "dark"
                        )
                            ? "#fff"
                            : "#374151",
                    },
                },
            },
        },
    });
}

function updateChartThemes() {
    if (revenueChart && userChart) {
        revenueChart.destroy();
        userChart.destroy();
        initCharts();
    }
}

// DOM Loaded
document.addEventListener("DOMContentLoaded", function () {
    initCharts();

    document.getElementById("year1").addEventListener("change", function () {
        revenueChart.data.datasets[0].data = [
            12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000, 30000,
            40000, 38000, 45000,
        ].map((val) => val * (1 + (Math.random() * 0.2 - 0.1)));
        revenueChart.update();
    });

    document.getElementById("year2").addEventListener("change", function () {
        userChart.data.datasets[0].data = [
            850, 1100, 950, 1400, 1200, 1600, 1500, 1800, 1700, 2000, 1900,
            2200,
        ].map((val) => Math.round(val * (1 + (Math.random() * 0.2 - 0.1))));
        userChart.update();
    });
});
