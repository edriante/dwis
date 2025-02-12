document.addEventListener("DOMContentLoaded", function () {
    function createChart(canvasId, type, labels, datasetLabel, data, borderColor, backgroundColor) {
        const ctx = document.getElementById(canvasId).getContext('2d');
        return new Chart(ctx, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: datasetLabel,
                    data: data, 
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    }

    // Chart 1 - Services Bar Chart
    fetch('get_chart_data')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.category);
            const counts = data.map(item => item.count);
            createChart('myChart', 'bar', labels, 'Services', counts, 'rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 0.2)');
        })
        .catch(error => console.error('Error fetching data:', error));

    // Chart 2 - Weekly Users Line Chart
    fetch('get_users_data')
        .then(response => response.json())
        .then(data => {
            if (!data || typeof data !== 'object') {
                throw new Error('Invalid data received');
            }
            const weekLabels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            const userCounts = weekLabels.map(day => data[day] || 0);
            createChart('mySecondChart', 'line', weekLabels, 'Weekly Users Graph', userCounts, 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 0.2)');
        })
        .catch(error => console.error('Error fetching chart data:', error));
});

// Ensuring charts resize properly
window.addEventListener('resize', function () {
    Chart.helpers.each(Chart.instances, function (instance) {
        instance.resize();
    });
});
