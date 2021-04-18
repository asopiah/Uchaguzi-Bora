create table counties
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(255) not null,
    county_code varchar(255) not null,
    created_at  timestamp    null,
    updated_at  timestamp    null,
    deleted_at  timestamp    null,
    constraint counties_county_code_unique
        unique (county_code),
    constraint counties_name_unique
        unique (name)
)
    collate = utf8mb4_unicode_ci;

create table constituencies
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255)    not null,
    county_id  bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    deleted_at timestamp       null,
    constraint constituencies_name_unique
        unique (name),
    constraint county_fk_3705118
        foreign key (county_id) references counties (id)
)
    collate = utf8mb4_unicode_ci;

create table countries
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) null,
    short_code varchar(255) null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                          not null,
    connection text                                  not null,
    queue      text                                  not null,
    payload    longtext                              not null,
    exception  longtext                              not null,
    failed_at  timestamp default current_timestamp() not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table media
(
    id                bigint unsigned auto_increment
        primary key,
    model_type        varchar(255)                 not null,
    model_id          bigint unsigned              not null,
    uuid              char(36)                     null,
    collection_name   varchar(255)                 not null,
    name              varchar(255)                 not null,
    file_name         varchar(255)                 not null,
    mime_type         varchar(255)                 null,
    disk              varchar(255)                 not null,
    conversions_disk  varchar(255)                 null,
    size              bigint unsigned              not null,
    manipulations     longtext collate utf8mb4_bin not null,
    custom_properties longtext collate utf8mb4_bin not null,
    responsive_images longtext collate utf8mb4_bin not null,
    order_column      int unsigned                 null,
    created_at        timestamp                    null,
    updated_at        timestamp                    null,
    constraint custom_properties
        check (json_valid(`custom_properties`)),
    constraint manipulations
        check (json_valid(`manipulations`)),
    constraint responsive_images
        check (json_valid(`responsive_images`))
)
    collate = utf8mb4_unicode_ci;

create index media_model_type_model_id_index
    on media (model_type, model_id);

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table offices
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null,
    constraint offices_name_unique
        unique (name)
)
    collate = utf8mb4_unicode_ci;

create table password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

create table permissions
(
    id         bigint unsigned auto_increment
        primary key,
    title      varchar(255) null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table questions
(
    id         bigint unsigned auto_increment
        primary key,
    question   varchar(255) not null,
    status     varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null,
    constraint questions_question_unique
        unique (question)
)
    collate = utf8mb4_unicode_ci;

create table resources
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table question_resource
(
    question_id bigint unsigned not null,
    resource_id bigint unsigned not null,
    constraint question_id_fk_3705087
        foreign key (question_id) references questions (id)
            on delete cascade,
    constraint resource_id_fk_3705087
        foreign key (resource_id) references resources (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table respondent_categories
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table respondents
(
    id                    bigint unsigned auto_increment
        primary key,
    respondentcategory_id bigint unsigned null,
    name                  varchar(255)    null,
    age                   int             null,
    gander                varchar(255)    null,
    created_at            timestamp       null,
    updated_at            timestamp       null,
    deleted_at            timestamp       null,
    constraint respondentcategory_fk_3705076
        foreign key (respondentcategory_id) references respondent_categories (id)
)
    collate = utf8mb4_unicode_ci;

create table answers
(
    id            bigint unsigned auto_increment
        primary key,
    date          date            null,
    event         varchar(255)    null,
    question_id   bigint unsigned not null,
    country_id    bigint unsigned null,
    respondent_id bigint unsigned null,
    other_place   varchar(255)    null,
    url           varchar(255)    null,
    created_at    timestamp       null,
    updated_at    timestamp       null,
    deleted_at    timestamp       null,
    constraint country_fk_3705156
        foreign key (country_id) references countries (id),
    constraint question_fk_3705093
        foreign key (question_id) references questions (id),
    constraint respondent_fk_3706231
        foreign key (respondent_id) references respondents (id)
)
    collate = utf8mb4_unicode_ci;

create table answer_constituency
(
    answer_id       bigint unsigned not null,
    constituency_id bigint unsigned not null,
    constraint answer_id_fk_3705159
        foreign key (answer_id) references answers (id)
            on delete cascade,
    constraint constituency_id_fk_3705159
        foreign key (constituency_id) references constituencies (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table answer_county
(
    answer_id bigint unsigned not null,
    county_id bigint unsigned not null,
    constraint answer_id_fk_3705157
        foreign key (answer_id) references answers (id)
            on delete cascade,
    constraint county_id_fk_3705157
        foreign key (county_id) references counties (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table answer_office
(
    answer_id bigint unsigned not null,
    office_id bigint unsigned not null,
    constraint answer_id_fk_3705220
        foreign key (answer_id) references answers (id)
            on delete cascade,
    constraint office_id_fk_3705220
        foreign key (office_id) references offices (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table roles
(
    id         bigint unsigned auto_increment
        primary key,
    title      varchar(255) null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table permission_role
(
    role_id       bigint unsigned not null,
    permission_id bigint unsigned not null,
    constraint permission_id_fk_3704985
        foreign key (permission_id) references permissions (id)
            on delete cascade,
    constraint role_id_fk_3704985
        foreign key (role_id) references roles (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table sources
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table answer_source
(
    answer_id bigint unsigned not null,
    source_id bigint unsigned not null,
    constraint answer_id_fk_3705252
        foreign key (answer_id) references answers (id)
            on delete cascade,
    constraint source_id_fk_3705252
        foreign key (source_id) references sources (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table sub_counties
(
    id         bigint unsigned auto_increment
        primary key,
    county_id  bigint unsigned null,
    name       varchar(255)    null,
    created_at timestamp       null,
    updated_at timestamp       null,
    deleted_at timestamp       null,
    constraint county_fk_3705629
        foreign key (county_id) references counties (id)
)
    collate = utf8mb4_unicode_ci;

create table answer_sub_county
(
    answer_id     bigint unsigned not null,
    sub_county_id bigint unsigned not null,
    constraint answer_id_fk_3705158
        foreign key (answer_id) references answers (id)
            on delete cascade,
    constraint sub_county_id_fk_3705158
        foreign key (sub_county_id) references sub_counties (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(255) not null,
    email             varchar(255) not null,
    email_verified_at datetime     null,
    password          varchar(255) not null,
    remember_token    varchar(255) null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    deleted_at        timestamp    null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;

create table role_user
(
    user_id bigint unsigned not null,
    role_id bigint unsigned not null,
    constraint role_id_fk_3704994
        foreign key (role_id) references roles (id)
            on delete cascade,
    constraint user_id_fk_3704994
        foreign key (user_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table wards
(
    id              bigint unsigned auto_increment
        primary key,
    name            varchar(255)    not null,
    county_id       bigint unsigned not null,
    constituency_id bigint unsigned not null,
    created_at      timestamp       null,
    updated_at      timestamp       null,
    deleted_at      timestamp       null,
    constraint constituency_fk_3705125
        foreign key (constituency_id) references constituencies (id),
    constraint county_fk_3705124
        foreign key (county_id) references counties (id)
)
    collate = utf8mb4_unicode_ci;

create table answer_ward
(
    answer_id bigint unsigned not null,
    ward_id   bigint unsigned not null,
    constraint answer_id_fk_3705160
        foreign key (answer_id) references answers (id)
            on delete cascade,
    constraint ward_id_fk_3705160
        foreign key (ward_id) references wards (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

