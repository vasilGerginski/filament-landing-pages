<?php

return [
    // Resource
    'resource' => [
        'label' => 'Лендинг страница',
        'plural_label' => 'Лендинг страници',
    ],

    // Flat keys used in resource
    'title' => 'Заглавие',
    'slug' => 'Slug',
    'slug_helper' => 'URL идентификатор. Използвайте само букви, цифри и тирета.',
    'meta_description' => 'Мета описание',
    'goal_type' => 'Тип цел',
    'goal_type_helper' => 'Изберете шаблон, за да започнете с предварително конфигурирани секции.',
    'goal' => 'Цел',
    'is_active' => 'Активна',
    'is_active_helper' => 'Само активните лендинг страници са публично достъпни.',
    'active' => 'Активна',
    'enable_analytics' => 'Активиране на анализи',
    'tracking_code' => 'Код за проследяване',
    'tracking_code_helper' => 'Добавете персонализирани скриптове за проследяване (Google Analytics, Facebook Pixel и др.)',
    'utm_source' => 'UTM Източник',
    'utm_medium' => 'UTM Канал',
    'utm_campaign' => 'UTM Кампания',

    // Table actions
    'duplicate' => 'Дублирай',
    'preview' => 'Преглед',
    'view_live' => 'Виж на живо',
    'add_section' => 'Добави секция',
    'show_active_only' => 'Покажи само активните',
    'activate_selected' => 'Активирай избраните',
    'deactivate_selected' => 'Деактивирай избраните',

    // Form fields (nested)
    'fields' => [
        'title' => 'Заглавие',
        'slug' => 'Slug',
        'meta_description' => 'Мета описание',
        'meta_keywords' => 'Мета ключови думи',
        'goal_type' => 'Тип цел',
        'is_active' => 'Активна',
        'sections' => 'Секции',
    ],

    // Goal types
    'goal_types' => [
        'lead_generation' => 'Генериране на лийдове',
        'sales' => 'Продажби',
        'awareness' => 'Повишаване на осведомеността',
        'event' => 'Регистрация за събитие',
        'newsletter' => 'Абонамент за бюлетин',
        'demo' => 'Заявка за демо',
        'custom' => 'Персонализирана',
    ],

    // Block labels
    'blocks' => [
        'hero_section' => 'Героична секция',
        'challenges_section' => 'Секция предизвикателства',
        'solution_section' => 'Секция решения',
        'icon_list_section' => 'Списък с икони',
        'testimonials_section' => 'Секция отзиви',
        'faq_section' => 'Секция ЧЗВ',
        'cta_section' => 'Призив за действие',
        'trust_indicators_section' => 'Секция за доверие',
        'lead_form' => 'Лиид форма',
        'newsletter_signup' => 'Абонамент за бюлетин',
        'event_registration' => 'Регистрация за събитие',
        'product_showcase' => 'Представяне на продукти',
        'pricing_table' => 'Ценова таблица',
        'countdown_timer' => 'Обратно броене',
    ],

    // Preview & display
    'preview_mode' => 'Режим на преглед - Това е преглед на вашата страница',
    'live_preview_mode' => 'Режим на преглед - Промените не са записани',
    'coming_soon' => 'ОЧАКВАЙТЕ СКОРО!',
    'no_sections' => 'Няма намерени секции.',
    'invalid_section' => 'Невалиден формат на секция',
    'missing_type' => "Липсва 'type' в данните на секцията",

    // Validation messages
    'validation' => [
        'name_required' => 'Моля, въведете вашето име.',
        'name_max' => 'Името е твърде дълго.',
        'phone_required' => 'Моля, въведете вашият тел. номер.',
        'phone_max' => 'Телефонният номер е твърде дълъг.',
        'email_required' => 'Моля, въведете вашият имейл.',
        'email_invalid' => 'Моля, въведете валиден имейл адрес.',
        'email_max' => 'Имейлът е твърде дълъг.',
        'consent_required' => 'Моля, приемете условията за обработка на лични данни.',
    ],

    // Notifications
    'notifications' => [
        'verification_email_subject' => 'Потвърдете вашия имейл адрес',
        'verification_email_greeting' => 'Здравейте!',
        'verification_email_line1' => 'Моля, натиснете бутона по-долу, за да потвърдите вашия имейл адрес.',
        'verification_email_action' => 'Потвърди имейл',
        'verification_email_line2' => 'Ако не сте попълвали форма на нашия уебсайт, не е необходимо никакво допълнително действие.',
        'saved' => 'Лендинг страницата е запазена успешно.',
    ],

    // Actions
    'actions' => [
        'preview' => 'Преглед',
        'edit' => 'Редактиране',
        'delete' => 'Изтриване',
        'create' => 'Създай лендинг страница',
    ],

    // Leads
    'leads' => 'Лийдове',
    'lead' => 'Лийд',
    'lead_information' => 'Информация за лийда',
    'name' => 'Име',
    'email' => 'Имейл',
    'phone' => 'Телефон',
    'verified' => 'Потвърден',
    'email_verified_at' => 'Имейл потвърден на',
    'created_at' => 'Създаден на',
    'verified_only' => 'Само потвърдени',
    'unverified_only' => 'Само непотвърдени',
    'date_range' => 'Период',
    'today' => 'Днес',
    'this_week' => 'Тази седмица',
    'this_month' => 'Този месец',

    // Email verification
    'verification_invalid_title' => 'Невалиден линк',
    'verification_invalid_message' => 'Този линк за потвърждение е невалиден или е изтекъл.',
    'verification_already_title' => 'Вече е потвърдено',
    'verification_already_message' => ':name, вашият имейл вече е потвърден.',
    'verification_success_title' => 'Имейл потвърден',
    'verification_success_message' => 'Благодарим :name! Вашият имейл е успешно потвърден.',

];
