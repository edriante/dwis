document.addEventListener("DOMContentLoaded", function () {
    function createChart(canvasId, type, labels, datasetLabel, data, borderColor, backgroundColor) {
        const canvas = document.getElementById(canvasId);
        if (!canvas) {
            console.error(`Canvas with ID '${canvasId}' not found.`);
            return;
        }
        
        const ctx = canvas.getContext('2d');

        
        const isSmallScreen = window.innerWidth <= 768;
        const fontSize = isSmallScreen ? 14 : 18; 
        const fontWeight = isSmallScreen ? '600' : '700'; 
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
                            precision: 0,
                            font: {
                                size: fontSize,
                                weight: fontWeight
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: fontSize,
                                weight: fontWeight
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: isSmallScreen ? 'bottom' : 'top', 
                        labels: {
                            font: {
                                size: fontSize,
                                weight: fontWeight
                            }
                        }
                    }
                }
            }
        });
    }

  
fetch('get_chart_data')
.then(response => response.json())
.then(data => {
    if (!Array.isArray(data)) {
        throw new Error('Invalid data format for services chart');
    }
    const labels = data.map(item => item.category_name);
    const counts = data.map(item => item.service_count); 
    createChart('myChart', 'bar', labels, 'Services', counts, 'rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 0.2)');
})
.catch(error => console.error('Error fetching services chart data:', error));


    
    fetch('get_users_data')
        .then(response => response.json())
        .then(data => {
            if (!data || typeof data !== 'object') {
                throw new Error('Invalid data received for users chart');
            }
            const weekLabels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            const userCounts = weekLabels.map(day => data[day] || 0);
            createChart('mySecondChart', 'line', weekLabels, 'Weekly Users Graph', userCounts, 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 0.2)');
        })
        .catch(error => console.error('Error fetching users chart data:', error));

   
    window.addEventListener('resize', function () {
        Object.values(Chart.instances).forEach(instance => {
            if (instance) {
                instance.resize();
            }
        });
    });
});
