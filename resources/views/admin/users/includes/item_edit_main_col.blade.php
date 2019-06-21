@php
    /** @var \App\User $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs mb-2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <div class="tab-pane active" id="maindata" role="tabpanel">
                    <div class="form-group">
                        <label for="title">Имя пользователя</label>
                        <input name="name" value="{{ $item->name }}"
                               id="name"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="slug">E-mail</label>
                        <input name="email" value="{{ $item->email }}"
                               id="email"
                               type="text"
                               class="form-control">
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input name="password" value="{{ $item->password }}"
                                   id="password"
                                   type="text"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm_password">Подтвердите пароль</label>
                            <input name="confirm_password" value="{{ $item->password }}"
                                   id="confirm_password"
                                   type="text"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>