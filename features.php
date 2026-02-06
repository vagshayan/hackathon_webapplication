<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - Learnme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Learnme</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="overview.php">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-5">Features</h1>

        <!-- Feature Tabs -->
        <ul class="nav nav-tabs mb-4" id="featureTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="jotpad-tab" data-bs-toggle="tab" data-bs-target="#jotpad" type="button">Jotpad</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notes-upload-tab" data-bs-toggle="tab" data-bs-target="#notes-upload" type="button">Notes Upload</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes" type="button">Notes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pomodoro-tab" data-bs-toggle="tab" data-bs-target="#pomodoro" type="button">Pomodoro Clock</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ai-summarizer-tab" data-bs-toggle="tab" data-bs-target="#ai-summarizer" type="button">AI Summarizer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="todo-tab" data-bs-toggle="tab" data-bs-target="#todo" type="button">Todo List</button>
            </li>
        </ul>

        <div class="tab-content" id="featureTabContent">
            <!-- Jotpad -->
            <div class="tab-pane fade show active" id="jotpad" role="tabpanel">
                <div class="card">
                    <div class="card-header">Jotpad - Hand Draw and Type Notes</div>
                    <div class="card-body">
                        <?php if (!isLoggedIn()): ?>
                            <div class="alert alert-info">Please <a href="login.php">login</a> to use this feature.</div>
                        <?php else: ?>
                            <div class="jotpad-container">
                                <div class="jotpad-tools">
                                    <button class="btn btn-primary" id="drawBtn">Draw</button>
                                    <button class="btn btn-secondary" id="textBtn">Type</button>
                                    <button class="btn btn-success" id="clearBtn">Clear</button>
                                    <button class="btn btn-info" id="saveJotpadBtn">Save</button>
                                    <input type="color" id="colorPicker" value="#000000" title="Color">
                                    <input type="range" id="brushSize" min="1" max="20" value="5" title="Brush Size">
                                    <span id="brushSizeLabel">Size: 5</span>
                                </div>
                                <div class="canvas-container">
                                    <canvas id="jotpadCanvas" width="800" height="500" style="border: 1px solid #ddd; cursor: crosshair;"></canvas>
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Add Text Note:</label>
                                    <textarea class="form-control" id="jotpadText" rows="5" placeholder="Type your notes here..."></textarea>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Notes Upload -->
            <div class="tab-pane fade" id="notes-upload" role="tabpanel">
                <div class="card">
                    <div class="card-header">Upload Notes</div>
                    <div class="card-body">
                        <?php if (!isLoggedIn()): ?>
                            <div class="alert alert-info">Please <a href="login.php">login</a> to upload notes.</div>
                        <?php else: ?>
                            <form id="uploadNoteForm" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Note Title</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload File (PDF, DOC, TXT, or Image)</label>
                                    <input type="file" class="form-control" name="note_file" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description (Optional)</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload Note</button>
                            </form>
                            <div id="uploadMessage" class="mt-3"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Notes View -->
            <div class="tab-pane fade" id="notes" role="tabpanel">
                <div class="card">
                    <div class="card-header">Your Notes</div>
                    <div class="card-body">
                        <?php if (!isLoggedIn()): ?>
                            <div class="alert alert-info">Please <a href="login.php">login</a> to view your notes.</div>
                        <?php else: ?>
                            <div id="notesList" class="notes-list"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pomodoro Clock -->
            <div class="tab-pane fade" id="pomodoro" role="tabpanel">
                <div class="card">
                    <div class="card-header">Pomodoro Clock</div>
                    <div class="card-body">
                        <div class="pomodoro-container">
                            <div class="pomodoro-timer" id="pomodoroTimer">25:00</div>
                            <div class="pomodoro-controls">
                                <button class="btn btn-primary" id="startPomodoroBtn">Start</button>
                                <button class="btn btn-secondary" id="pausePomodoroBtn">Pause</button>
                                <button class="btn btn-danger" id="resetPomodoroBtn">Reset</button>
                            </div>
                            <div class="mt-4">
                                <label class="form-label">Session Type:</label>
                                <select class="form-select" id="pomodoroType">
                                    <option value="25">Work (25 minutes)</option>
                                    <option value="5">Short Break (5 minutes)</option>
                                    <option value="15">Long Break (15 minutes)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- AI Summarizer -->
            <div class="tab-pane fade" id="ai-summarizer" role="tabpanel">
                <div class="card">
                    <div class="card-header">AI Summarizer</div>
                    <div class="card-body">
                        <?php if (!isLoggedIn()): ?>
                            <div class="alert alert-info">Please <a href="login.php">login</a> to use AI Summarizer.</div>
                        <?php else: ?>
                            <div class="summarizer-container">
                                <label class="form-label">Enter text to summarize:</label>
                                <textarea class="form-control summarizer-input" id="summarizerInput" placeholder="Paste your text here..."></textarea>
                                <button class="btn btn-primary mt-3" id="summarizeBtn">Summarize</button>
                                <div class="summarizer-output" id="summarizerOutput" style="display: none;">
                                    <h5>Summary:</h5>
                                    <p id="summaryText"></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Todo List -->
            <div class="tab-pane fade" id="todo" role="tabpanel">
                <div class="card">
                    <div class="card-header">Todo List</div>
                    <div class="card-body">
                        <?php if (!isLoggedIn()): ?>
                            <div class="alert alert-info">Please <a href="login.php">login</a> to use Todo List.</div>
                        <?php else: ?>
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="todoInput" placeholder="Add a new task...">
                                    <button class="btn btn-primary" id="addTodoBtn">Add</button>
                                </div>
                            </div>
                            <div id="todoList"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Learnme. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/features.js"></script>
</body>
</html>

