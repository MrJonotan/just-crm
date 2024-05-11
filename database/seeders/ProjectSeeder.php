<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title'                 => 'Современный жилой комплекс в центре города',
            'status_id'             => '2',
            'priority_id'           => '2',
            'manager_id'            => '3',
            'client_id'             => '2',
            'color'                 => '#2F4F4F',
            'start_date_plan'       => Carbon::create('2024', '03', '01', '09', '00','00')->toDateTimeString(),
            'start_date_fact'       => Carbon::create('2024', '03', '04', '09', '15','00')->toDateTimeString(),
            'end_date_plan'         => Carbon::create('2025', '04', '25', '18', '00','00')->toDateTimeString(),
            'end_date_fact'         => null,
            'specific'              => 'Разработать архитектурный проект и дизайн интерьеров для нового жилого комплекса в центре города, предоставив клиенту уникальное и современное пространство для жизни.',
            'measurable'            => 'Достичь утверждения клиентом финального проекта и начала строительства комплекса в течение 6 месяцев.',
            'achievable'            => 'Внедрить все требования клиента в проект и обеспечить соблюдение сроков, учитывая ресурсы и ограничения.',
            'relevant'              => 'Создать жилой комплекс, который будет соответствовать современным тенденциям и ожиданиям будущих жильцов, обеспечивая им комфорт и удобства.',
            'time_bound'            => 'Завершить проект в течение 12 месяцев с момента его начала, чтобы клиент мог начать строительство в плановые сроки.',
            'budget_plan'           => '32800000',
            'budget_fact'           => null,
            'hours'                 => '2348',
            'readiness'             => '12',
        ]);
        DB::table('projects')->insert([
            'title'                 => 'Реконструкция офисного здания в историческом районе',
            'status_id'             => '3',
            'priority_id'           => '2',
            'manager_id'            => '3',
            'client_id'             => '3',
            'color'                 => '#ADFF2F',
            'start_date_plan'       => Carbon::create('2024', '08', '05', '09', '00','00')->toDateTimeString(),
            'start_date_fact'       => null,
            'end_date_plan'         => Carbon::create('2025', '06', '09', '18', '00','00')->toDateTimeString(),
            'end_date_fact'         => null,
            'specific'              => 'Провести реконструкцию офисного здания в соответствии с историческими стандартами и требованиями клиента, сохраняя его аутентичность и функциональность.',
            'measurable'            => 'Утвердить окончательный проект реконструкции и начать строительные работы в течение 4 месяцев после начала проекта.',
            'achievable'            => 'Реализовать концепцию реконструкции, учитывая техническую осуществимость, бюджетные ограничения и требования охраны исторического наследия.',
            'relevant'              => 'Преобразить офисное здание в современное и функциональное пространство, соответствующее потребностям клиента и требованиям рынка недвижимости.',
            'time_bound'            => 'Завершить реконструкцию и передать готовое здание заказчику в течение 10 месяцев с момента начала проекта, соблюдая все сроки и качественные стандарты.',
            'budget_plan'           => '28600000',
            'budget_fact'           => null,
            'hours'                 => '1839',
            'readiness'             => '0',
        ]);
        DB::table('projects')->insert([
            'title'                 => 'Администрирование системы',
            'status_id'             => '2',
            'priority_id'           => '2',
            'manager_id'            => '1',
            'client_id'             => '1',
            'color'                 => '#AD6F2F',
            'start_date_plan'       => null,
            'start_date_fact'       => null,
            'end_date_plan'         => null,
            'end_date_fact'         => null,
            'specific'              => 'Поддерживать в рабочем состоянии офисную технику, устанавливать ПО, организовывать новые рабочие места. Следить за безопасностью данных. Производить добавление новых пользователей и добавление им прав согласно занимаемой должности',
            'measurable'            => 'Проводить техническое обслуживание оборудование раз в два квартала и поддерживать рабочее состояние CRM',
            'achievable'            => 'Своевременно заказывать расходные материалы для офисного оборудования и выполлнять задачи от сотрудников',
            'relevant'              => 'Преобразить офисное здание в современное и функциональное пространство, соответствующее потребностям клиента и требованиям рынка недвижимости.',
            'time_bound'            => 'На все время использования ПК, офисного оборудования и системы',
            'budget_plan'           => null,
            'budget_fact'           => null,
            'hours'                 => '0',
            'readiness'             => '0',
        ]);
    }
}