--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: auditoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE auditoria (
    id_audi integer NOT NULL,
    tp_audi integer,
    id_user integer,
    dt_audi character varying(200),
    f_audi date,
    h_audi time without time zone
);


ALTER TABLE public.auditoria OWNER TO postgres;

--
-- Name: auditoria_id_audi_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE auditoria_id_audi_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auditoria_id_audi_seq OWNER TO postgres;

--
-- Name: auditoria_id_audi_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE auditoria_id_audi_seq OWNED BY auditoria.id_audi;


--
-- Name: citas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE citas (
    id_citas integer NOT NULL,
    id_hojas_c integer,
    id_pac integer,
    estado integer,
    det_cita character varying(200)
);


ALTER TABLE public.citas OWNER TO postgres;

--
-- Name: citas_id_citas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE citas_id_citas_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.citas_id_citas_seq OWNER TO postgres;

--
-- Name: citas_id_citas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE citas_id_citas_seq OWNED BY citas.id_citas;


--
-- Name: constancias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE constancias (
    id_cons integer NOT NULL,
    id_pac integer,
    fh_cons date,
    fh_inic date,
    fh_fin date
);


ALTER TABLE public.constancias OWNER TO postgres;

--
-- Name: constancias_id_cons_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE constancias_id_cons_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.constancias_id_cons_seq OWNER TO postgres;

--
-- Name: constancias_id_cons_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE constancias_id_cons_seq OWNED BY constancias.id_cons;


--
-- Name: consumo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE consumo (
    id_con integer NOT NULL,
    fh_con date,
    id_pro character varying(20),
    cant_con integer
);


ALTER TABLE public.consumo OWNER TO postgres;

--
-- Name: consumo_id_con_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE consumo_id_con_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.consumo_id_con_seq OWNER TO postgres;

--
-- Name: consumo_id_con_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE consumo_id_con_seq OWNED BY consumo.id_con;


--
-- Name: contras; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE contras (
    id_contra integer NOT NULL,
    contra character varying(80)
);


ALTER TABLE public.contras OWNER TO postgres;

--
-- Name: contras_id_contra_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE contras_id_contra_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contras_id_contra_seq OWNER TO postgres;

--
-- Name: contras_id_contra_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE contras_id_contra_seq OWNED BY contras.id_contra;


--
-- Name: especialidad; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE especialidad (
    id_esp integer NOT NULL,
    esp character varying(20)
);


ALTER TABLE public.especialidad OWNER TO postgres;

--
-- Name: especialidad_id_esp_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE especialidad_id_esp_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.especialidad_id_esp_seq OWNER TO postgres;

--
-- Name: especialidad_id_esp_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE especialidad_id_esp_seq OWNED BY especialidad.id_esp;


--
-- Name: hist_contra; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE hist_contra (
    id_hc integer NOT NULL,
    id_his integer,
    id_contra integer
);


ALTER TABLE public.hist_contra OWNER TO postgres;

--
-- Name: hist_contra_id_hc_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hist_contra_id_hc_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hist_contra_id_hc_seq OWNER TO postgres;

--
-- Name: hist_contra_id_hc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hist_contra_id_hc_seq OWNED BY hist_contra.id_hc;


--
-- Name: hist_tra; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE hist_tra (
    id_ht integer NOT NULL,
    id_his integer,
    id_tra integer
);


ALTER TABLE public.hist_tra OWNER TO postgres;

--
-- Name: hist_tra_id_ht_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hist_tra_id_ht_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hist_tra_id_ht_seq OWNER TO postgres;

--
-- Name: hist_tra_id_ht_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hist_tra_id_ht_seq OWNED BY hist_tra.id_ht;


--
-- Name: historias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE historias (
    id_his integer NOT NULL,
    qr_code character varying(20),
    id_pac integer,
    fh_his date
);


ALTER TABLE public.historias OWNER TO postgres;

--
-- Name: historias_id_his_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE historias_id_his_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.historias_id_his_seq OWNER TO postgres;

--
-- Name: historias_id_his_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE historias_id_his_seq OWNED BY historias.id_his;


--
-- Name: hoja_cita; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE hoja_cita (
    id_hoja_c integer NOT NULL,
    fh_hoja_c date
);


ALTER TABLE public.hoja_cita OWNER TO postgres;

--
-- Name: hoja_cita_id_hoja_c_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hoja_cita_id_hoja_c_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hoja_cita_id_hoja_c_seq OWNER TO postgres;

--
-- Name: hoja_cita_id_hoja_c_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hoja_cita_id_hoja_c_seq OWNED BY hoja_cita.id_hoja_c;


--
-- Name: inventario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inventario (
    id_inv integer NOT NULL,
    id_pro character varying(20),
    exis integer,
    med character varying(3)
);


ALTER TABLE public.inventario OWNER TO postgres;

--
-- Name: inventario_id_inv_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inventario_id_inv_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inventario_id_inv_seq OWNER TO postgres;

--
-- Name: inventario_id_inv_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inventario_id_inv_seq OWNED BY inventario.id_inv;


--
-- Name: levels; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE levels (
    id_level integer NOT NULL,
    level character varying(20),
    desc_level character varying(200)
);


ALTER TABLE public.levels OWNER TO postgres;

--
-- Name: levels_id_level_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE levels_id_level_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.levels_id_level_seq OWNER TO postgres;

--
-- Name: levels_id_level_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE levels_id_level_seq OWNED BY levels.id_level;


--
-- Name: paciente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE paciente (
    id_pac integer NOT NULL,
    nom_pac character varying(80),
    ape_pac character varying(80),
    ced_pac character varying(20),
    fh_nac date,
    direcc character varying(200),
    edad integer,
    gen character varying(9),
    tlf character varying(12),
    esp integer,
    tra character varying(3)
);


ALTER TABLE public.paciente OWNER TO postgres;

--
-- Name: paciente_id_pac_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paciente_id_pac_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paciente_id_pac_seq OWNER TO postgres;

--
-- Name: paciente_id_pac_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE paciente_id_pac_seq OWNED BY paciente.id_pac;


--
-- Name: producto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE producto (
    id_pro character varying(20) NOT NULL,
    nom_pro character varying(30),
    det_pro character varying(100)
);


ALTER TABLE public.producto OWNER TO postgres;

--
-- Name: recepcion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE recepcion (
    id_rec integer NOT NULL,
    fh_rec date,
    id_pro character varying(20),
    cant_rec integer
);


ALTER TABLE public.recepcion OWNER TO postgres;

--
-- Name: recepcion_id_rec_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recepcion_id_rec_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recepcion_id_rec_seq OWNER TO postgres;

--
-- Name: recepcion_id_rec_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE recepcion_id_rec_seq OWNED BY recepcion.id_rec;


--
-- Name: recipes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE recipes (
    id_rec integer NOT NULL,
    id_pac integer,
    info_rec text,
    fh_rec date
);


ALTER TABLE public.recipes OWNER TO postgres;

--
-- Name: recipes_id_rec_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recipes_id_rec_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recipes_id_rec_seq OWNER TO postgres;

--
-- Name: recipes_id_rec_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE recipes_id_rec_seq OWNED BY recipes.id_rec;


--
-- Name: tipo_auditoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_auditoria (
    id_ta integer NOT NULL,
    tp_audi character varying(10)
);


ALTER TABLE public.tipo_auditoria OWNER TO postgres;

--
-- Name: tipo_auditoria_id_ta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_auditoria_id_ta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_auditoria_id_ta_seq OWNER TO postgres;

--
-- Name: tipo_auditoria_id_ta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_auditoria_id_ta_seq OWNED BY tipo_auditoria.id_ta;


--
-- Name: tratamiento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tratamiento (
    id_tra integer NOT NULL,
    titulo character varying(50),
    detalles character varying(200),
    fecha date
);


ALTER TABLE public.tratamiento OWNER TO postgres;

--
-- Name: tratamiento_id_tra_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tratamiento_id_tra_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tratamiento_id_tra_seq OWNER TO postgres;

--
-- Name: tratamiento_id_tra_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tratamiento_id_tra_seq OWNED BY tratamiento.id_tra;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id_user integer NOT NULL,
    nom_user character varying(80),
    ape_user character varying(80),
    ced_user character varying(10),
    log_user character varying(20),
    pw_user character varying(900),
    level integer,
    scr_qutn character varying(900),
    scr_anw character varying(900),
    crt_date timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_user_seq OWNER TO postgres;

--
-- Name: users_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_user_seq OWNED BY users.id_user;


--
-- Name: id_audi; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY auditoria ALTER COLUMN id_audi SET DEFAULT nextval('auditoria_id_audi_seq'::regclass);


--
-- Name: id_citas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY citas ALTER COLUMN id_citas SET DEFAULT nextval('citas_id_citas_seq'::regclass);


--
-- Name: id_cons; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY constancias ALTER COLUMN id_cons SET DEFAULT nextval('constancias_id_cons_seq'::regclass);


--
-- Name: id_con; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY consumo ALTER COLUMN id_con SET DEFAULT nextval('consumo_id_con_seq'::regclass);


--
-- Name: id_contra; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contras ALTER COLUMN id_contra SET DEFAULT nextval('contras_id_contra_seq'::regclass);


--
-- Name: id_esp; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY especialidad ALTER COLUMN id_esp SET DEFAULT nextval('especialidad_id_esp_seq'::regclass);


--
-- Name: id_hc; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hist_contra ALTER COLUMN id_hc SET DEFAULT nextval('hist_contra_id_hc_seq'::regclass);


--
-- Name: id_ht; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hist_tra ALTER COLUMN id_ht SET DEFAULT nextval('hist_tra_id_ht_seq'::regclass);


--
-- Name: id_his; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY historias ALTER COLUMN id_his SET DEFAULT nextval('historias_id_his_seq'::regclass);


--
-- Name: id_hoja_c; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hoja_cita ALTER COLUMN id_hoja_c SET DEFAULT nextval('hoja_cita_id_hoja_c_seq'::regclass);


--
-- Name: id_inv; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inventario ALTER COLUMN id_inv SET DEFAULT nextval('inventario_id_inv_seq'::regclass);


--
-- Name: id_level; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY levels ALTER COLUMN id_level SET DEFAULT nextval('levels_id_level_seq'::regclass);


--
-- Name: id_pac; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente ALTER COLUMN id_pac SET DEFAULT nextval('paciente_id_pac_seq'::regclass);


--
-- Name: id_rec; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recepcion ALTER COLUMN id_rec SET DEFAULT nextval('recepcion_id_rec_seq'::regclass);


--
-- Name: id_rec; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipes ALTER COLUMN id_rec SET DEFAULT nextval('recipes_id_rec_seq'::regclass);


--
-- Name: id_ta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_auditoria ALTER COLUMN id_ta SET DEFAULT nextval('tipo_auditoria_id_ta_seq'::regclass);


--
-- Name: id_tra; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tratamiento ALTER COLUMN id_tra SET DEFAULT nextval('tratamiento_id_tra_seq'::regclass);


--
-- Name: id_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id_user SET DEFAULT nextval('users_id_user_seq'::regclass);


--
-- Data for Name: auditoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY auditoria (id_audi, tp_audi, id_user, dt_audi, f_audi, h_audi) FROM stdin;
6	5	4	El usuario Jesus Orlando Rojas Artahona de nivel 1 a iniciado sesión el: 2016-07-16 a las 6:25:17.	2016-07-16	06:25:17
7	5	6	El usuario demo demo de nivel 1 a iniciado sesión el: 2016-08-1 a las 8:14:11.	2016-08-01	08:14:11
8	5	4	El usuario Jesus Orlando Rojas Artahona de nivel 1 a iniciado sesión el: 2016-08-1 a las 8:14:20.	2016-08-01	08:14:20
9	5	4	El usuario Jesus Orlando Rojas Artahona de nivel 1 a iniciado sesión el: 2016-08-4 a las 7:32:17.	2016-08-04	07:32:17
\.


--
-- Name: auditoria_id_audi_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('auditoria_id_audi_seq', 9, true);


--
-- Data for Name: citas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY citas (id_citas, id_hojas_c, id_pac, estado, det_cita) FROM stdin;
\.


--
-- Name: citas_id_citas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('citas_id_citas_seq', 1, false);


--
-- Data for Name: constancias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY constancias (id_cons, id_pac, fh_cons, fh_inic, fh_fin) FROM stdin;
\.


--
-- Name: constancias_id_cons_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('constancias_id_cons_seq', 1, false);


--
-- Data for Name: consumo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY consumo (id_con, fh_con, id_pro, cant_con) FROM stdin;
\.


--
-- Name: consumo_id_con_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('consumo_id_con_seq', 1, false);


--
-- Data for Name: contras; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY contras (id_contra, contra) FROM stdin;
\.


--
-- Name: contras_id_contra_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('contras_id_contra_seq', 1, false);


--
-- Data for Name: especialidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY especialidad (id_esp, esp) FROM stdin;
1	Electronica
2	Informatica
3	Electricidad
4	Mecanica
5	Agroalimentacion
6	Construccion civil
\.


--
-- Name: especialidad_id_esp_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('especialidad_id_esp_seq', 6, true);


--
-- Data for Name: hist_contra; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY hist_contra (id_hc, id_his, id_contra) FROM stdin;
\.


--
-- Name: hist_contra_id_hc_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hist_contra_id_hc_seq', 1, false);


--
-- Data for Name: hist_tra; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY hist_tra (id_ht, id_his, id_tra) FROM stdin;
\.


--
-- Name: hist_tra_id_ht_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hist_tra_id_ht_seq', 1, false);


--
-- Data for Name: historias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY historias (id_his, qr_code, id_pac, fh_his) FROM stdin;
\.


--
-- Name: historias_id_his_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('historias_id_his_seq', 1, false);


--
-- Data for Name: hoja_cita; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY hoja_cita (id_hoja_c, fh_hoja_c) FROM stdin;
\.


--
-- Name: hoja_cita_id_hoja_c_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hoja_cita_id_hoja_c_seq', 1, false);


--
-- Data for Name: inventario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inventario (id_inv, id_pro, exis, med) FROM stdin;
\.


--
-- Name: inventario_id_inv_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inventario_id_inv_seq', 1, false);


--
-- Data for Name: levels; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY levels (id_level, level, desc_level) FROM stdin;
1	1	Administrador
2	2	Auditor
3	3	Usuario
4	4	Doctor
\.


--
-- Name: levels_id_level_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('levels_id_level_seq', 4, true);


--
-- Data for Name: paciente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY paciente (id_pac, nom_pac, ape_pac, ced_pac, fh_nac, direcc, edad, gen, tlf, esp, tra) FROM stdin;
\.


--
-- Name: paciente_id_pac_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paciente_id_pac_seq', 1, false);


--
-- Data for Name: producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY producto (id_pro, nom_pro, det_pro) FROM stdin;
\.


--
-- Data for Name: recepcion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recepcion (id_rec, fh_rec, id_pro, cant_rec) FROM stdin;
\.


--
-- Name: recepcion_id_rec_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recepcion_id_rec_seq', 1, false);


--
-- Data for Name: recipes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recipes (id_rec, id_pac, info_rec, fh_rec) FROM stdin;
\.


--
-- Name: recipes_id_rec_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recipes_id_rec_seq', 1, false);


--
-- Data for Name: tipo_auditoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipo_auditoria (id_ta, tp_audi) FROM stdin;
1	Agregar
2	Consulta
3	Eliminar
4	Modificar
5	Inicio
6	Salida
\.


--
-- Name: tipo_auditoria_id_ta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_auditoria_id_ta_seq', 6, true);


--
-- Data for Name: tratamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tratamiento (id_tra, titulo, detalles, fecha) FROM stdin;
\.


--
-- Name: tratamiento_id_tra_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tratamiento_id_tra_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id_user, nom_user, ape_user, ced_user, log_user, pw_user, level, scr_qutn, scr_anw, crt_date) FROM stdin;
4	Jesus Orlando	Rojas Artahona	V-24115035	kamicase24	l6egnpqknKLP4g==	1	stjZ3NeUytrO2o+XyYWC3saB1I7aydOD3s+h	09TT1so=	2016-07-16 18:08:01.923238
6	demo	demo	V-222	demo	ydjc3A==	1	puPU2dHdzdyF14WX2I/O5srTzEDYzYWT6o7P08nT0KA=	l6Wh	2016-07-16 18:08:08.19163
7	admin	admin	V-111	admin	xtfc1tM=	1	stjZ3NeUytrO2o+XyYWC3saB1I7aydOD3s+h	l6Wh	2016-07-16 18:08:58.15439
8	pende	deja	E-222	sad	2NTT	1	puPU2dHdzdyF14WX2I/O5srTzEDYzYWT6o7P08nT0KA=	l6Wh	2016-07-16 19:10:58.221744
\.


--
-- Name: users_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_user_seq', 8, true);


--
-- Name: auditoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY auditoria
    ADD CONSTRAINT auditoria_pkey PRIMARY KEY (id_audi);


--
-- Name: citas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY citas
    ADD CONSTRAINT citas_pkey PRIMARY KEY (id_citas);


--
-- Name: constancias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY constancias
    ADD CONSTRAINT constancias_pkey PRIMARY KEY (id_cons);


--
-- Name: consumo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY consumo
    ADD CONSTRAINT consumo_pkey PRIMARY KEY (id_con);


--
-- Name: contras_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contras
    ADD CONSTRAINT contras_pkey PRIMARY KEY (id_contra);


--
-- Name: especialidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY especialidad
    ADD CONSTRAINT especialidad_pkey PRIMARY KEY (id_esp);


--
-- Name: hist_contra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY hist_contra
    ADD CONSTRAINT hist_contra_pkey PRIMARY KEY (id_hc);


--
-- Name: hist_tra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY hist_tra
    ADD CONSTRAINT hist_tra_pkey PRIMARY KEY (id_ht);


--
-- Name: historias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY historias
    ADD CONSTRAINT historias_pkey PRIMARY KEY (id_his);


--
-- Name: hoja_cita_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY hoja_cita
    ADD CONSTRAINT hoja_cita_pkey PRIMARY KEY (id_hoja_c);


--
-- Name: inventario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inventario
    ADD CONSTRAINT inventario_pkey PRIMARY KEY (id_inv);


--
-- Name: levels_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY levels
    ADD CONSTRAINT levels_pkey PRIMARY KEY (id_level);


--
-- Name: paciente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY paciente
    ADD CONSTRAINT paciente_pkey PRIMARY KEY (id_pac);


--
-- Name: producto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id_pro);


--
-- Name: recepcion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY recepcion
    ADD CONSTRAINT recepcion_pkey PRIMARY KEY (id_rec);


--
-- Name: recipes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY recipes
    ADD CONSTRAINT recipes_pkey PRIMARY KEY (id_rec);


--
-- Name: tipo_auditoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_auditoria
    ADD CONSTRAINT tipo_auditoria_pkey PRIMARY KEY (id_ta);


--
-- Name: tratamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tratamiento
    ADD CONSTRAINT tratamiento_pkey PRIMARY KEY (id_tra);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- Name: auditoria_tp_audi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY auditoria
    ADD CONSTRAINT auditoria_tp_audi_fkey FOREIGN KEY (tp_audi) REFERENCES tipo_auditoria(id_ta);


--
-- Name: citas_id_hojas_c_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY citas
    ADD CONSTRAINT citas_id_hojas_c_fkey FOREIGN KEY (id_hojas_c) REFERENCES hoja_cita(id_hoja_c);


--
-- Name: citas_id_pac_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY citas
    ADD CONSTRAINT citas_id_pac_fkey FOREIGN KEY (id_pac) REFERENCES paciente(id_pac);


--
-- Name: constancias_id_pac_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY constancias
    ADD CONSTRAINT constancias_id_pac_fkey FOREIGN KEY (id_pac) REFERENCES paciente(id_pac);


--
-- Name: consumo_id_pro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY consumo
    ADD CONSTRAINT consumo_id_pro_fkey FOREIGN KEY (id_pro) REFERENCES producto(id_pro);


--
-- Name: hist_contra_id_contra_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hist_contra
    ADD CONSTRAINT hist_contra_id_contra_fkey FOREIGN KEY (id_contra) REFERENCES contras(id_contra);


--
-- Name: hist_contra_id_his_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hist_contra
    ADD CONSTRAINT hist_contra_id_his_fkey FOREIGN KEY (id_his) REFERENCES historias(id_his);


--
-- Name: hist_tra_id_his_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hist_tra
    ADD CONSTRAINT hist_tra_id_his_fkey FOREIGN KEY (id_his) REFERENCES historias(id_his);


--
-- Name: hist_tra_id_tra_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hist_tra
    ADD CONSTRAINT hist_tra_id_tra_fkey FOREIGN KEY (id_tra) REFERENCES tratamiento(id_tra);


--
-- Name: historias_id_pac_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY historias
    ADD CONSTRAINT historias_id_pac_fkey FOREIGN KEY (id_pac) REFERENCES paciente(id_pac);


--
-- Name: inventario_id_pro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inventario
    ADD CONSTRAINT inventario_id_pro_fkey FOREIGN KEY (id_pro) REFERENCES producto(id_pro);


--
-- Name: paciente_esp_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente
    ADD CONSTRAINT paciente_esp_fkey FOREIGN KEY (esp) REFERENCES especialidad(id_esp);


--
-- Name: recepcion_id_pro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recepcion
    ADD CONSTRAINT recepcion_id_pro_fkey FOREIGN KEY (id_pro) REFERENCES producto(id_pro);


--
-- Name: recipes_id_pac_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipes
    ADD CONSTRAINT recipes_id_pac_fkey FOREIGN KEY (id_pac) REFERENCES paciente(id_pac);


--
-- Name: users_level_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_level_fkey FOREIGN KEY (level) REFERENCES levels(id_level);


--
-- Name: users_level_fkey1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_level_fkey1 FOREIGN KEY (level) REFERENCES levels(id_level) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

