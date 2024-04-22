<div>

    <div class="card">`
        <div class="card-body">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    @script
        <script>
            const ctx = document.getElementById('myChart');
            const data = $wire.data;

            const label = data.map(item => item.Day);
            const values = data.map(item => item.Value);

            console.log(data);
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: '# of Votes',
                        data: values,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endscript
</div>
