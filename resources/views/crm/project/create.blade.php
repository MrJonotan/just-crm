<div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="project_edit"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="col-12 justify-content-center">
            <div class="col-12 row justify-content-center" style="margin-left: 5px; margin-bottom: 10px">
                <div class="col-7">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Название</span>
                        <input class="form-control" id="name">
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Статус</span>
                        <select class="form-control" id="status">
                            <option value="1">Готов</option>
                            <option value="2">В работе</option>
                            <option value="3">Отложен</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Приоритет</span>
                        <select class="form-control" id="proritet">
                            <option value="1">Низкий</option>
                            <option value="2">Средний</option>
                            <option value="3">Высокий</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 row justify-content-center" style="margin-left: 5px; margin-bottom: 10px">
                <div class="col-3">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Начало</span>
                        <input class="form-control" type="date" id="start_plan">
                    </div>
                </div>
                <div class="col-3" >
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Окончание</span>
                        <input class="form-control" type="date" id="start_plan">
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Часы</span>
                        <input class="form-control" type="number" id="hours">
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Клиент</span>
                        <select class="form-control" id="client">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 row justify-content-center" style="margin-left: 5px; margin-bottom: 10px">
                <div class="col-7">
                    <div class="col-12 text-nowrap" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Команда</span>
                        <select class="form-control" id="employees">
                        </select>
                    </div>
                </div>
                <div class="col-5">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Менеджер</span>
                        <select class="form-control" id="manager">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 row justify-content-center" style="margin-left: 5px; margin-bottom: 10px">
                <div class="col-5">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Бюджет (план)</span>
                        <input class="form-control" id="budget_plan">
                    </div>
                </div>
                <div class="col-5">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Бюджет (факт)</span>
                        <input class="form-control" id="budget_fact">
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                        <span class="direct-chat-timestamp">Цвет</span>
                        <input class="form-control" type="color" id="color" value="#00fbfa" style="padding: 0; border-color: transparent">
                    </div>
                </div>
            </div>
            <div class="col-12 row justify-content-center" style="margin-left: 13px; width: 98%;">
                <div class="col-12" style="border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%; padding-bottom: 7px;">
                    <span class="direct-chat-timestamp">Описание</span>
                    <textarea class="form-control" id="description"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="save_changes">Сохранить</button>
        <button type="button" class="btn btn-sm btn-success" id="end_project">Завершить</button>
        <button type="button" class="btn btn-sm btn-danger" id="delete_project">Удалить</button>
    </div>
</div>
