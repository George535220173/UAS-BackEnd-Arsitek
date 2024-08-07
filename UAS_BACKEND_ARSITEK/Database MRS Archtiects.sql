PGDMP   )                    |            UAS_ARSITEK_LARAVEL    16.3    16.3 T    \           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ]           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ^           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            _           1262    16704    UAS_ARSITEK_LARAVEL    DATABASE     �   CREATE DATABASE "UAS_ARSITEK_LARAVEL" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';
 %   DROP DATABASE "UAS_ARSITEK_LARAVEL";
                postgres    false            `           0    0    SCHEMA public    ACL     '   GRANT ALL ON SCHEMA public TO laravel;
                   pg_database_owner    false    5            �            1259    17175    articles    TABLE     M  CREATE TABLE public.articles (
    id bigint NOT NULL,
    article_title character varying(255) NOT NULL,
    article_author character varying(255) NOT NULL,
    thumbnail character varying(255),
    article_link character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.articles;
       public         heap    postgres    false            �            1259    17174    articles_id_seq    SEQUENCE     x   CREATE SEQUENCE public.articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.articles_id_seq;
       public          postgres    false    235            a           0    0    articles_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.articles_id_seq OWNED BY public.articles.id;
          public          postgres    false    234            �            1259    17094    cache    TABLE     �   CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);
    DROP TABLE public.cache;
       public         heap    postgres    false            �            1259    17101    cache_locks    TABLE     �   CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);
    DROP TABLE public.cache_locks;
       public         heap    postgres    false            �            1259    17126    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    17125    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    227            b           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    226            �            1259    17118    job_batches    TABLE     d  CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);
    DROP TABLE public.job_batches;
       public         heap    postgres    false            �            1259    17109    jobs    TABLE     �   CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);
    DROP TABLE public.jobs;
       public         heap    postgres    false            �            1259    17108    jobs_id_seq    SEQUENCE     t   CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.jobs_id_seq;
       public          postgres    false    224            c           0    0    jobs_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;
          public          postgres    false    223            �            1259    16739 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    laravel    false            �            1259    16742    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          laravel    false    215            d           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          laravel    false    216            �            1259    17078    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    17138    project_categories    TABLE     �   CREATE TABLE public.project_categories (
    id bigint NOT NULL,
    main_category character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 &   DROP TABLE public.project_categories;
       public         heap    postgres    false            �            1259    17137    project_categories_id_seq    SEQUENCE     �   CREATE SEQUENCE public.project_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.project_categories_id_seq;
       public          postgres    false    229            e           0    0    project_categories_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.project_categories_id_seq OWNED BY public.project_categories.id;
          public          postgres    false    228            �            1259    17163    project_images    TABLE     �   CREATE TABLE public.project_images (
    id bigint NOT NULL,
    project_id bigint NOT NULL,
    path character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 "   DROP TABLE public.project_images;
       public         heap    postgres    false            �            1259    17162    project_images_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.project_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.project_images_id_seq;
       public          postgres    false    233            f           0    0    project_images_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.project_images_id_seq OWNED BY public.project_images.id;
          public          postgres    false    232            �            1259    17149    projects    TABLE     �  CREATE TABLE public.projects (
    id bigint NOT NULL,
    project_name character varying(255) NOT NULL,
    client character varying(255) NOT NULL,
    time_taken character varying(255) NOT NULL,
    location character varying(255) NOT NULL,
    description text NOT NULL,
    category_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.projects;
       public         heap    postgres    false            �            1259    17148    projects_id_seq    SEQUENCE     x   CREATE SEQUENCE public.projects_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.projects_id_seq;
       public          postgres    false    231            g           0    0    projects_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.projects_id_seq OWNED BY public.projects.id;
          public          postgres    false    230            �            1259    17085    sessions    TABLE     �   CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);
    DROP TABLE public.sessions;
       public         heap    postgres    false            �            1259    17068    users    TABLE     Z  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    phone character varying(16),
    address text,
    gender character varying(255),
    CONSTRAINT users_gender_check CHECK (((gender)::text = ANY ((ARRAY['male'::character varying, 'female'::character varying])::text[])))
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    17067    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    218            h           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    217            �           2604    17178    articles id    DEFAULT     j   ALTER TABLE ONLY public.articles ALTER COLUMN id SET DEFAULT nextval('public.articles_id_seq'::regclass);
 :   ALTER TABLE public.articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    235    235            �           2604    17129    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    227    227            �           2604    17112    jobs id    DEFAULT     b   ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);
 6   ALTER TABLE public.jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    224    224            �           2604    16777    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          laravel    false    216    215            �           2604    17141    project_categories id    DEFAULT     ~   ALTER TABLE ONLY public.project_categories ALTER COLUMN id SET DEFAULT nextval('public.project_categories_id_seq'::regclass);
 D   ALTER TABLE public.project_categories ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    228    229            �           2604    17166    project_images id    DEFAULT     v   ALTER TABLE ONLY public.project_images ALTER COLUMN id SET DEFAULT nextval('public.project_images_id_seq'::regclass);
 @   ALTER TABLE public.project_images ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    233    232    233            �           2604    17152    projects id    DEFAULT     j   ALTER TABLE ONLY public.projects ALTER COLUMN id SET DEFAULT nextval('public.projects_id_seq'::regclass);
 :   ALTER TABLE public.projects ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    230    231    231            �           2604    17071    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217    218            Y          0    17175    articles 
   TABLE DATA           v   COPY public.articles (id, article_title, article_author, thumbnail, article_link, created_at, updated_at) FROM stdin;
    public          postgres    false    235   �b       K          0    17094    cache 
   TABLE DATA           7   COPY public.cache (key, value, expiration) FROM stdin;
    public          postgres    false    221   .i       L          0    17101    cache_locks 
   TABLE DATA           =   COPY public.cache_locks (key, owner, expiration) FROM stdin;
    public          postgres    false    222   Ci       Q          0    17126    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    227   Xi       O          0    17118    job_batches 
   TABLE DATA           �   COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
    public          postgres    false    225   mi       N          0    17109    jobs 
   TABLE DATA           c   COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
    public          postgres    false    224   �i       E          0    16739 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          laravel    false    215   �i       I          0    17078    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    219   l       S          0    17138    project_categories 
   TABLE DATA           ]   COPY public.project_categories (id, main_category, name, created_at, updated_at) FROM stdin;
    public          postgres    false    229   l       W          0    17163    project_images 
   TABLE DATA           V   COPY public.project_images (id, project_id, path, created_at, updated_at) FROM stdin;
    public          postgres    false    233   �m       U          0    17149    projects 
   TABLE DATA           �   COPY public.projects (id, project_name, client, time_taken, location, description, category_id, created_at, updated_at) FROM stdin;
    public          postgres    false    231   �t       J          0    17085    sessions 
   TABLE DATA           _   COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
    public          postgres    false    220    {       H          0    17068    users 
   TABLE DATA           �   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, phone, address, gender) FROM stdin;
    public          postgres    false    218   �|       i           0    0    articles_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.articles_id_seq', 12, true);
          public          postgres    false    234            j           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    226            k           0    0    jobs_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);
          public          postgres    false    223            l           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 66, true);
          public          laravel    false    216            m           0    0    project_categories_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.project_categories_id_seq', 8, true);
          public          postgres    false    228            n           0    0    project_images_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.project_images_id_seq', 29, true);
          public          postgres    false    232            o           0    0    projects_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.projects_id_seq', 15, true);
          public          postgres    false    230            p           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 2, true);
          public          postgres    false    217            �           2606    17182    articles articles_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.articles DROP CONSTRAINT articles_pkey;
       public            postgres    false    235            �           2606    17107    cache_locks cache_locks_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);
 F   ALTER TABLE ONLY public.cache_locks DROP CONSTRAINT cache_locks_pkey;
       public            postgres    false    222            �           2606    17100    cache cache_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);
 :   ALTER TABLE ONLY public.cache DROP CONSTRAINT cache_pkey;
       public            postgres    false    221            �           2606    17134    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    227            �           2606    17136 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    227            �           2606    17124    job_batches job_batches_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.job_batches DROP CONSTRAINT job_batches_pkey;
       public            postgres    false    225            �           2606    17116    jobs jobs_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_pkey;
       public            postgres    false    224            �           2606    16797    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            laravel    false    215            �           2606    17084 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    219            �           2606    17147 1   project_categories project_categories_name_unique 
   CONSTRAINT     l   ALTER TABLE ONLY public.project_categories
    ADD CONSTRAINT project_categories_name_unique UNIQUE (name);
 [   ALTER TABLE ONLY public.project_categories DROP CONSTRAINT project_categories_name_unique;
       public            postgres    false    229            �           2606    17145 *   project_categories project_categories_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.project_categories
    ADD CONSTRAINT project_categories_pkey PRIMARY KEY (id);
 T   ALTER TABLE ONLY public.project_categories DROP CONSTRAINT project_categories_pkey;
       public            postgres    false    229            �           2606    17168 "   project_images project_images_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.project_images
    ADD CONSTRAINT project_images_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.project_images DROP CONSTRAINT project_images_pkey;
       public            postgres    false    233            �           2606    17156    projects projects_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.projects DROP CONSTRAINT projects_pkey;
       public            postgres    false    231            �           2606    17091    sessions sessions_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.sessions DROP CONSTRAINT sessions_pkey;
       public            postgres    false    220            �           2606    17077    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    218            �           2606    17075    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    218            �           1259    17117    jobs_queue_index    INDEX     B   CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);
 $   DROP INDEX public.jobs_queue_index;
       public            postgres    false    224            �           1259    17093    sessions_last_activity_index    INDEX     Z   CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);
 0   DROP INDEX public.sessions_last_activity_index;
       public            postgres    false    220            �           1259    17092    sessions_user_id_index    INDEX     N   CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);
 *   DROP INDEX public.sessions_user_id_index;
       public            postgres    false    220            �           2606    17169 0   project_images project_images_project_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.project_images
    ADD CONSTRAINT project_images_project_id_foreign FOREIGN KEY (project_id) REFERENCES public.projects(id) ON DELETE CASCADE;
 Z   ALTER TABLE ONLY public.project_images DROP CONSTRAINT project_images_project_id_foreign;
       public          postgres    false    233    4783    231            �           2606    17157 %   projects projects_category_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.project_categories(id);
 O   ALTER TABLE ONLY public.projects DROP CONSTRAINT projects_category_id_foreign;
       public          postgres    false    231    4781    229            Y     7	Representasi Seni dalam Arsitektur Masjid Raya Al-Jabbar	Kompasiana	img/Article/image_2024-06-27_182607537.png	https://www.kompasiana.com/yoshishf1004/66795d73c925c4448724bab2/representasi-seni-dalam-arsitektur-masjid-raya-al-jabbar	2024-06-27 11:26:41	2024-06-27 11:26:41
 W  8	Melukis dengan Arsitektur: Menelusuri Pesona Estetika Kota Bandung yang Memikat Wisatawan	Kompasiana	img/Article/image_2024-06-27_182725848.png	https://www.kompasiana.com/rifqaayesha3024/66766c39c925c446ea136992/melukis-dengan-arsitektur-menelusuri-pesona-estetika-kota-bandung-yang-memikat-wisatawan	2024-06-27 11:27:34	2024-06-27 11:27:34
 �   9	Arsitektur dan Desain Kontemporer	Arsitag	img/Article/image_2024-06-27_182812435.png	https://www.arsitag.com/article/arsitektur-dan-desain-kontemporer	2024-06-27 11:28:20	2024-06-27 11:28:20
 �   10	Yu Sing, Arsitek Rumah Murah yang Sederhana dan Idealis	Arsitag	img/Article/image_2024-06-27_182847725.png	https://www.arsitag.com/article/yu-sing-arsitek-rumah-murah-yang-sederhana-dan-idealis	2024-06-27 11:28:50	2024-06-27 11:28:50
 �   11	Arsitektur: Pengertian dan Perjalanan Sejarahnya	Pemkomedan	img/Article/image_2024-06-27_182923466.png	https://perkimtaru.pemkomedan.go.id/artikel-995-arsitektur-pengertian-dan-perjalanan-sejarahnya.html	2024-06-27 11:29:25	2024-06-27 11:29:25
 �   12	Aliran Neoklasik pada Arsitektur Istana Bogor	Kompasiana	img/Article/image_2024-06-27_191150782.png	https://www.kompasiana.com/raniyazzhr/6670176bc925c46c96022932/aliran-neoklasik-pada-arsitektur-istana-bogor	2024-06-27 12:11:54	2024-06-27 12:11:54
    \.


      K      \.


      L      \.


      Q      \.


      O      \.


      N      \.


      E   *   56	0001_01_01_000000_create_users_table	1
 *   57	0001_01_01_000001_create_cache_table	1
 )   58	0001_01_01_000002_create_jobs_table	1
 7   59	2024_06_07_000000_create_project_categories_table	1
 -   60	2024_06_07_000001_create_projects_table	1
 3   61	2024_06_07_000002_create_project_images_table	1
 3   62	2024_06_07_131153_add_image_to_projects_table	1
 -   63	2024_06_09_094422_create_articles_table	1
 :   64	2024_06_10_145855_add_optional_fields_to_users_table	1
 9   65	2024_06_20_145416_add_category_id_to_projects_table	1
 =   66	2024_06_20_162030_drop_image_column_from_projects_table	1
    \.


      I      \.


      S   B   1	Architecture	Masterplan	2024-06-23 08:08:27	2024-06-23 08:08:27
 C   3	Architecture	Residential	2024-06-27 11:33:15	2024-06-27 11:33:15
 L   4	Architecture	Health and Community	2024-06-27 11:33:28	2024-06-27 11:33:28
 O   6	Architecture	Office and Headquarters	2024-06-27 11:34:19	2024-06-27 11:34:19
 B   7	Interior Design	Private	2024-06-27 11:34:30	2024-06-27 11:34:30
 B   8	Interior Design	Company	2024-06-27 11:34:36	2024-06-27 11:34:36
    \.


      W   I   9	9	img/Project/Masterplan 1.png	2024-06-27 11:38:22	2024-06-27 11:38:22
 J   10	9	img/Project/Masterplan 2.png	2024-06-27 11:38:22	2024-06-27 11:38:22
 J   11	9	img/Project/Masterplan 3.png	2024-06-27 11:38:22	2024-06-27 11:38:22
 X   12	10	img/Project/Office and headquarters 1.png	2024-06-27 11:40:32	2024-06-27 11:40:32
 X   13	10	img/Project/Office and headquarters 2.png	2024-06-27 11:40:32	2024-06-27 11:40:32
 Y   14	10	img/Project/Office and headquarters 13.png	2024-06-27 11:40:32	2024-06-27 11:40:32
 U   15	11	img/Project/Masrerplan yang lain 1.png	2024-06-27 11:44:24	2024-06-27 11:44:24
 T   16	11	img/Project/Masterplan yanglain 2.png	2024-06-27 11:44:24	2024-06-27 11:44:24
 T   17	11	img/Project/Masterplan yanglain 3.png	2024-06-27 11:44:24	2024-06-27 11:44:24
 L   18	12	img/Project/Rumah sakit 1.png	2024-06-27 11:46:12	2024-06-27 11:46:12
 L   19	12	img/Project/Rumah sakit 2.png	2024-06-27 11:46:12	2024-06-27 11:46:12
 L   20	12	img/Project/Rumah sakit 3.png	2024-06-27 11:46:12	2024-06-27 11:46:12
 L   21	13	img/Project/Residential 1.png	2024-06-27 11:48:14	2024-06-27 11:48:14
 L   22	13	img/Project/Residential 2.png	2024-06-27 11:48:14	2024-06-27 11:48:14
 H   23	14	img/Project/Company 1.png	2024-06-27 11:50:40	2024-06-27 11:50:40
 H   24	14	img/Project/Company 2.png	2024-06-27 11:50:40	2024-06-27 11:50:40
 H   25	14	img/Project/Company 3.png	2024-06-27 11:50:40	2024-06-27 11:50:40
 F   26	15	img/Project/Rumah 1.png	2024-06-27 11:53:23	2024-06-27 11:53:23
 F   27	15	img/Project/Rumah 2.png	2024-06-27 11:53:23	2024-06-27 11:53:23
 F   28	15	img/Project/Rumah 3.png	2024-06-27 11:53:23	2024-06-27 11:53:23
 F   29	15	img/Project/Rumah 4.png	2024-06-27 11:53:23	2024-06-27 11:53:23
    \.


      U   	  10	Krakatau Steel Office & Commercial	PT Krakatau Steel Indonesia	31 October 2005 - 11 April 2023	Jl Industri Serang, Banten	Proposal: Pembuatan office and Headquarters bernama Krakatau Steel Office & Commercial di Banten.	6	2024-06-27 11:40:32	2024-06-27 11:43:18
   11	Masterplan Tambang Batubara	PT Cakra Bumi Energy	03 February 2008 - 12 September 2023	Muara Enim - Palembang,Sumsel	Masterplan perusahaan tambang batubara yang berada di Sumatera Selatan. Diselesaikan pada tahun 2023	1	2024-06-27 11:44:24	2024-06-27 11:44:24
 �   12	Rumah Sakit Nahdlatul Ulama	Nahdlatul Ulama Cabang Jawa Tengah	06 December 2007 - 03 January 2023	Jl Ajibarang Secang	Proposal untuk pembuatan Rumah sakit Nahdlatul Ulama di Jawa Tengah	4	2024-06-27 11:46:12	2024-06-27 11:46:12
 �   13	Omah Keboen	Private Developer	03 April 2001 - 30 March 2022	Jl. Pacul - Bali	Proposal untuk pembuatan residential private developer bernama Omah Keboen yang berada di Bali.	3	2024-06-27 11:48:14	2024-06-27 11:48:14
 �   14	KNI MARKETING GALLERY	PT KRAKATAU NIAGA INDONESIA	03 April 2007 - 23 May 2024	Jl Gatot Soebroto	Completion pada tahun 2024 untuk design interior company bernama KNI MARKETING GALLERY di Jl Gatot Soebroto	8	2024-06-27 11:50:40	2024-06-27 11:50:40
 �   15	RUMAH TINGGAL PERMATA BERLIAN	Private	10 June 2008 - 17 January 2024	Jl Permata Berlian	Pembuatan interior design untuk private house.	7	2024-06-27 11:53:23	2024-06-27 11:53:23
 �   9	ReMaster Planning PPLI	PT PPLI-DOWA Japan	02 June 2007 - 22 November 2023	Jl Klari, Karawang	Pembuatan PPLI dalam skala besar.	1	2024-06-27 11:38:22	2024-06-27 12:12:36
    \.


      J   �  Wd39hslKyYF2pacdTZSeyCFkeIFSe27DyZZ0T6fo	\N	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 OPR/109.0.0.0	YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXJtMFBzQ3I2QUpOUTI5WEd1UktSNzFiZnNKZ3Z1NEN1Q01uNVhxWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=	1719500574
    \.


      H   �   1	mrsadminteam@gmail.com	mrsadminteam@gmail.com	\N	$2y$12$gU.20BATyrKTpjfYb/SQjeO284tVxlbvfCExx5pTHGUnim.A3CCle	\N	2024-06-23 08:08:14	2024-06-23 08:08:14	\N	\N	\N
 �   2	george	georgeweiliz21@gmail.com	\N	$2y$12$fu2FjZj8H0klpHiV9nxq.ObEYHTQIak.yPHhLla7a1tZm.LS4AiVW	\N	2024-06-23 08:59:26	2024-06-23 08:59:26	\N	\N	\N
    \.


     