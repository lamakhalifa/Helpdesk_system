<!-- resources/views/components/content.blade.php -->

<div class="right-panel">
    <div class="grid-item">
        <h1>Ticket</h1>
        <button class="new ticket-btn">New Ticket</button>
    </div>
    <div class="grid-item">
        <a href="#" class="tab active" data-target="content1">Ticket</a>
        <a href="#" class="tab" data-target="content2">Scheduled Ticket</a>
    </div>
    <div class="content" id="content1">
        <div class="grid-item3">
            <input type="checkbox" name="all-selected" id="all-selected">
            <div>
                <a href="#">Delete</a>
            </div>
            <div>
                <a href="#">Set status</a>
            </div>
            <div>
                <a href="#">Set priority</a>
            </div>
        </div>
        <div class="grid-item4">
        </div>
        <div class="grid-item5">
            <div class="wrapper">
                <div class="table-container">
                    <table>
                        <tr>
                            <th></th>
                            <th>Details</th>
                            <th>Agent</th>
                            <th>Priority</th>
                            <th>Activity Status</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="selected" id="selected"></td>
                            <td>
                                <h5 class="ticket-name">Example Ticket</h5>
                                <h5 class="ticket-creator">Creator Name</h5>
                                <div class="time">
                                    <p class="ticket-created">Created 46 mins ago</p>
                                    <p class="ticket-modified">Modified 12 mins ago</p>
                                </div>
                            </td>
                            <td>Agent Name</td>
                            <td>Critical</td>
                            <td>Unresolved</td>
                            <td><h5 class="activity">Open</h5></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="content" id="content2" style="display: none;">
        <div class="grid-item">
            <div class="dashboard-header">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ticket-btn">
                    <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                </a>
            </div>
        </div>

        <div class="row">
            <!-- Add your cards here -->
            <!-- Example card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold title-color text-uppercase mb-1">
                                    Open Tickets
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-circle-notch"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat for other cards -->
        </div>

        <div class="wrapper">
            <div class="table-container">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAME</th>
                        <th scope="col">RESPONSES</th>
                        <th scope="col">RESOLUTIONS</th>
                        <th scope="col">WARNINGS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Critical</td>
                        <td>4</td>
                        <td>2</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>High</td>
                        <td>2</td>
                        <td>24</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Medium</td>
                        <td>3</td>
                        <td>48</td>
                        <td>40</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>
</div>
