<?php if (! empty($errors)): ?>
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container top-0 end-0 p-1">
            <div class="toast show text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <span class="bi bi-info-circle-fill"></span>
                    <strong class="me-auto"> Tolong dilengkapi data berikut!</strong>
                    <!-- <small>11 mins ago</small> -->
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <!-- Then put toasts within -->
                            <li>
                                <?= esc($error) ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>