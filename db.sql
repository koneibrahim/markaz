--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5 (Ubuntu 11.5-0ubuntu0.19.04.1)
-- Dumped by pg_dump version 11.5 (Ubuntu 11.5-0ubuntu0.19.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: achats; Type: TABLE; Schema: public; Owner: kone
--

CREATE TABLE public.achats (
    id_ac integer NOT NULL,
    date_ac date DEFAULT now(),
    montant integer,
    montant_paye integer,
    etat_liv character(1),
    libele character varying(70),
    etat integer,
    id_fo integer,
    CONSTRAINT etat_liv_check CHECK (((etat_liv = 'N'::bpchar) OR (etat_liv = 'P'::bpchar) OR (etat_liv = 'T'::bpchar))),
    CONSTRAINT montant_pay_check CHECK (((montant_paye >= 0) AND (montant_paye <= montant)))
);


ALTER TABLE public.achats OWNER TO kone;

--
-- Name: achats_id_ac_seq; Type: SEQUENCE; Schema: public; Owner: kone
--

CREATE SEQUENCE public.achats_id_ac_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.achats_id_ac_seq OWNER TO kone;

--
-- Name: achats_id_ac_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kone
--

ALTER SEQUENCE public.achats_id_ac_seq OWNED BY public.achats.id_ac;


--
-- Name: calendriers; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.calendriers (
    id_d integer NOT NULL,
    mois character varying(20)
);


ALTER TABLE public.calendriers OWNER TO abdallah;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: kone
--

CREATE TABLE public.categories (
    id_cat integer NOT NULL,
    nom_cat character varying(20)
);


ALTER TABLE public.categories OWNER TO kone;

--
-- Name: categories_id_cat_seq; Type: SEQUENCE; Schema: public; Owner: kone
--

CREATE SEQUENCE public.categories_id_cat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_cat_seq OWNER TO kone;

--
-- Name: categories_id_cat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kone
--

ALTER SEQUENCE public.categories_id_cat_seq OWNED BY public.categories.id_cat;


--
-- Name: classes; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.classes (
    id_cl integer NOT NULL,
    nom_cl character varying(70) NOT NULL,
    niveau character varying(20) NOT NULL
);


ALTER TABLE public.classes OWNER TO abdallah;

--
-- Name: classes_id_cl_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.classes_id_cl_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.classes_id_cl_seq OWNER TO abdallah;

--
-- Name: classes_id_cl_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.classes_id_cl_seq OWNED BY public.classes.id_cl;


--
-- Name: contenu_acha; Type: TABLE; Schema: public; Owner: kone
--

CREATE TABLE public.contenu_acha (
    id_cac integer NOT NULL,
    id_ac integer,
    prix_acha integer,
    qte_pro integer,
    qte_liv integer,
    nom_pro character varying(100)
);


ALTER TABLE public.contenu_acha OWNER TO kone;

--
-- Name: contenu_acha_id_cac_seq; Type: SEQUENCE; Schema: public; Owner: kone
--

CREATE SEQUENCE public.contenu_acha_id_cac_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contenu_acha_id_cac_seq OWNER TO kone;

--
-- Name: contenu_acha_id_cac_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kone
--

ALTER SEQUENCE public.contenu_acha_id_cac_seq OWNED BY public.contenu_acha.id_cac;


--
-- Name: depenses; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.depenses (
    id_dep integer NOT NULL,
    motif character varying(150) NOT NULL,
    date_dep date DEFAULT now(),
    montant integer,
    id_pa integer
);


ALTER TABLE public.depenses OWNER TO abdallah;

--
-- Name: depenses_id_dep_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.depenses_id_dep_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.depenses_id_dep_seq OWNER TO abdallah;

--
-- Name: depenses_id_dep_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.depenses_id_dep_seq OWNED BY public.depenses.id_dep;


--
-- Name: eleves; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.eleves (
    id_el integer NOT NULL,
    nom_el character varying(70) NOT NULL,
    prenom_el character varying(60) NOT NULL,
    date_nais date NOT NULL,
    id_cl integer,
    id_tu integer
);


ALTER TABLE public.eleves OWNER TO abdallah;

--
-- Name: eleves_id_el_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.eleves_id_el_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.eleves_id_el_seq OWNER TO abdallah;

--
-- Name: eleves_id_el_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.eleves_id_el_seq OWNED BY public.eleves.id_el;


--
-- Name: fournisseurs; Type: TABLE; Schema: public; Owner: kone
--

CREATE TABLE public.fournisseurs (
    id_fo integer NOT NULL,
    prenom_f character varying(20),
    nom_f character varying(20),
    adresse character varying(70),
    contact character varying(20)
);


ALTER TABLE public.fournisseurs OWNER TO kone;

--
-- Name: fournisseurs_id_fo_seq; Type: SEQUENCE; Schema: public; Owner: kone
--

CREATE SEQUENCE public.fournisseurs_id_fo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fournisseurs_id_fo_seq OWNER TO kone;

--
-- Name: fournisseurs_id_fo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kone
--

ALTER SEQUENCE public.fournisseurs_id_fo_seq OWNED BY public.fournisseurs.id_fo;


--
-- Name: inscriptions; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.inscriptions (
    id_ins integer NOT NULL,
    prenom_el character varying(75) NOT NULL,
    nom_el character varying(75) NOT NULL,
    date_nais date NOT NULL,
    date_ins date DEFAULT now(),
    nom_tu character varying(90) NOT NULL,
    tel1 character varying(15) NOT NULL,
    tel2 character varying(15)
);


ALTER TABLE public.inscriptions OWNER TO abdallah;

--
-- Name: inscriptions_id_ins_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.inscriptions_id_ins_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inscriptions_id_ins_seq OWNER TO abdallah;

--
-- Name: inscriptions_id_ins_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.inscriptions_id_ins_seq OWNED BY public.inscriptions.id_ins;


--
-- Name: mois_id_dt_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.mois_id_dt_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mois_id_dt_seq OWNER TO abdallah;

--
-- Name: mois_id_dt_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.mois_id_dt_seq OWNED BY public.calendriers.id_d;


--
-- Name: parcours; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.parcours (
    id integer NOT NULL,
    id_el integer,
    nom_par character varying(50) NOT NULL,
    qte_m integer DEFAULT 0,
    qte_r integer DEFAULT 0,
    qte integer DEFAULT 0
);


ALTER TABLE public.parcours OWNER TO abdallah;

--
-- Name: parcours_id_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.parcours_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parcours_id_seq OWNER TO abdallah;

--
-- Name: parcours_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.parcours_id_seq OWNED BY public.parcours.id;


--
-- Name: pay_per; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.pay_per (
    id_pa integer NOT NULL,
    date_pa date DEFAULT now(),
    id_p integer,
    paye integer NOT NULL,
    reste integer,
    id_d integer,
    nom_p character varying(30),
    tel_p character varying(20)
);


ALTER TABLE public.pay_per OWNER TO abdallah;

--
-- Name: pay_per_id_pa_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.pay_per_id_pa_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pay_per_id_pa_seq OWNER TO abdallah;

--
-- Name: pay_per_id_pa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.pay_per_id_pa_seq OWNED BY public.pay_per.id_pa;


--
-- Name: payements; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.payements (
    id_pay integer NOT NULL,
    date_pay date DEFAULT now(),
    id_el integer,
    montant_p integer,
    nom_p character varying(40),
    tel_p character varying(25),
    id_d integer,
    total integer
);


ALTER TABLE public.payements OWNER TO abdallah;

--
-- Name: payements_id_pay_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.payements_id_pay_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.payements_id_pay_seq OWNER TO abdallah;

--
-- Name: payements_id_pay_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.payements_id_pay_seq OWNED BY public.payements.id_pay;


--
-- Name: personnels; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.personnels (
    id_p integer NOT NULL,
    prenom character varying(70) NOT NULL,
    nom character varying(60) NOT NULL,
    adresse character varying(75) NOT NULL,
    tel1 character varying(15) NOT NULL,
    tel2 character varying(15),
    salaire integer,
    id_cl integer,
    id_cat integer
);


ALTER TABLE public.personnels OWNER TO abdallah;

--
-- Name: personnels_id_p_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.personnels_id_p_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personnels_id_p_seq OWNER TO abdallah;

--
-- Name: personnels_id_p_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.personnels_id_p_seq OWNED BY public.personnels.id_p;


--
-- Name: tuteurs; Type: TABLE; Schema: public; Owner: abdallah
--

CREATE TABLE public.tuteurs (
    id_tu integer NOT NULL,
    nom_tu character varying(70) NOT NULL,
    adresse character varying(75) NOT NULL,
    tel1 character varying(15),
    tel2 character varying(15)
);


ALTER TABLE public.tuteurs OWNER TO abdallah;

--
-- Name: tuteurs_id_tu_seq; Type: SEQUENCE; Schema: public; Owner: abdallah
--

CREATE SEQUENCE public.tuteurs_id_tu_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tuteurs_id_tu_seq OWNER TO abdallah;

--
-- Name: tuteurs_id_tu_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: abdallah
--

ALTER SEQUENCE public.tuteurs_id_tu_seq OWNED BY public.tuteurs.id_tu;


--
-- Name: achats id_ac; Type: DEFAULT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.achats ALTER COLUMN id_ac SET DEFAULT nextval('public.achats_id_ac_seq'::regclass);


--
-- Name: calendriers id_d; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.calendriers ALTER COLUMN id_d SET DEFAULT nextval('public.mois_id_dt_seq'::regclass);


--
-- Name: categories id_cat; Type: DEFAULT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.categories ALTER COLUMN id_cat SET DEFAULT nextval('public.categories_id_cat_seq'::regclass);


--
-- Name: classes id_cl; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.classes ALTER COLUMN id_cl SET DEFAULT nextval('public.classes_id_cl_seq'::regclass);


--
-- Name: contenu_acha id_cac; Type: DEFAULT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.contenu_acha ALTER COLUMN id_cac SET DEFAULT nextval('public.contenu_acha_id_cac_seq'::regclass);


--
-- Name: depenses id_dep; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.depenses ALTER COLUMN id_dep SET DEFAULT nextval('public.depenses_id_dep_seq'::regclass);


--
-- Name: eleves id_el; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.eleves ALTER COLUMN id_el SET DEFAULT nextval('public.eleves_id_el_seq'::regclass);


--
-- Name: fournisseurs id_fo; Type: DEFAULT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.fournisseurs ALTER COLUMN id_fo SET DEFAULT nextval('public.fournisseurs_id_fo_seq'::regclass);


--
-- Name: inscriptions id_ins; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.inscriptions ALTER COLUMN id_ins SET DEFAULT nextval('public.inscriptions_id_ins_seq'::regclass);


--
-- Name: parcours id; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.parcours ALTER COLUMN id SET DEFAULT nextval('public.parcours_id_seq'::regclass);


--
-- Name: pay_per id_pa; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.pay_per ALTER COLUMN id_pa SET DEFAULT nextval('public.pay_per_id_pa_seq'::regclass);


--
-- Name: payements id_pay; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.payements ALTER COLUMN id_pay SET DEFAULT nextval('public.payements_id_pay_seq'::regclass);


--
-- Name: personnels id_p; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.personnels ALTER COLUMN id_p SET DEFAULT nextval('public.personnels_id_p_seq'::regclass);


--
-- Name: tuteurs id_tu; Type: DEFAULT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.tuteurs ALTER COLUMN id_tu SET DEFAULT nextval('public.tuteurs_id_tu_seq'::regclass);


--
-- Data for Name: achats; Type: TABLE DATA; Schema: public; Owner: kone
--

COPY public.achats (id_ac, date_ac, montant, montant_paye, etat_liv, libele, etat, id_fo) FROM stdin;
15	2020-03-31	4000	3000	P	Achat	1	23
\.


--
-- Data for Name: calendriers; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.calendriers (id_d, mois) FROM stdin;
1	Janvier
2	Fevrier
3	Mars
4	Avril
5	Mai
6	Juin
7	Juillet
9	Septembre
10	Octobre
11	Novembre
12	Decembre
8	Aout
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: kone
--

COPY public.categories (id_cat, nom_cat) FROM stdin;
1	Professeur
2	Secretariat
3	Asseinissement
4	Medecin
\.


--
-- Data for Name: classes; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.classes (id_cl, nom_cl, niveau) FROM stdin;
69	AL HOUROUF HIJA	Niveau 001
66	BOUACHIR	Niveau 000
25	ABDULLAH IBN ABASS	Niveau 004
24	ABDOULLAH BEN MASSOUD	Niveau 003
19	ALI BEN ABI TALIB	Niveau 002
\.


--
-- Data for Name: contenu_acha; Type: TABLE DATA; Schema: public; Owner: kone
--

COPY public.contenu_acha (id_cac, id_ac, prix_acha, qte_pro, qte_liv, nom_pro) FROM stdin;
\.


--
-- Data for Name: depenses; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.depenses (id_dep, motif, date_dep, montant, id_pa) FROM stdin;
26	BALLON	2020-02-14	2000	\N
27	DON UN PAUVRE	2020-03-08	32000	\N
28	SAC	2020-03-15	67000	\N
37	ESSENCE	2020-03-25	4000	\N
23	GAZOIL	2020-02-18	8500	\N
50	sss	2020-03-29	2000	\N
\.


--
-- Data for Name: eleves; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.eleves (id_el, nom_el, prenom_el, date_nais, id_cl, id_tu) FROM stdin;
17	SALIM 	SAMASSA	2005-11-29	25	7
18	IBRAHIM	KONE	2000-03-12	25	11
19	SIAKA	TRAORE	2000-03-01	25	12
20	MOHAMED 	TRAORE	2020-03-11	25	13
21	ADAMA	DOUMBIA	2020-03-12	24	12
22	ABOUBACAR	TRAORE	2010-01-02	66	10
23	YUNUSS	CISSE	2010-01-14	19	10
\.


--
-- Data for Name: fournisseurs; Type: TABLE DATA; Schema: public; Owner: kone
--

COPY public.fournisseurs (id_fo, prenom_f, nom_f, adresse, contact) FROM stdin;
23	BOUBA	SAMAKE	KATI	77667888
39	ssdd	dssssssss	ssssssssssssss	11111111111111111
40				
41				
42				
43				
44				
45				
46				
47				
48				
49				
50				
51				
52				
53				
54				
55				
\.


--
-- Data for Name: inscriptions; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.inscriptions (id_ins, prenom_el, nom_el, date_nais, date_ins, nom_tu, tel1, tel2) FROM stdin;
4	Moussa	Touré	1998-12-01	2019-09-12	Boubacar Samaké	99884561	\N
6	Seydou	Sacko	1998-12-01	2019-09-12	Madou Koné	99884563	\N
7	Ali	Bathily	1998-12-01	2019-09-12	Moussa Koné	99884564	\N
\.


--
-- Data for Name: parcours; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.parcours (id, id_el, nom_par, qte_m, qte_r, qte) FROM stdin;
\.


--
-- Data for Name: pay_per; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.pay_per (id_pa, date_pa, id_p, paye, reste, id_d, nom_p, tel_p) FROM stdin;
4	2020-02-04	17	90000	\N	4	Lamine DIAKITE	66772233
3	2020-02-05	16	75000	\N	3	Lamine DIAKITE	66772233
6	2020-03-22	16	75000	\N	2	SALIF SMAKE	90908877
10	2020-03-24	17	90000	\N	8	mklakmlak	987685432
32	2020-03-30	19	100000	\N	4	MOUNIR DJIRE	90908877
33	2020-03-30	19	100000	\N	11	MOUNIR DJIRE	89898977
14	2020-03-24	18	115000	\N	4	MOUSSE SACKO	191773173
17	2020-03-26	18	115000	\N	12	HOLA SANKARA	55667788
\.


--
-- Data for Name: payements; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.payements (id_pay, date_pay, id_el, montant_p, nom_p, tel_p, id_d, total) FROM stdin;
49	2020-03-19	19	30000	Aboubacar SAMAKE	7777777	1	\N
55	2020-03-22	18	30000	ALI GUINDO	8877997	1	\N
48	2020-03-19	17	20000	MOUSSA YALKOYE	11111111	2	\N
52	2020-03-19	23	22	LALA	929901010	2	\N
51	2020-03-19	23	222	ISSA DJAROMA	9098877	1	\N
53	2020-03-19	23	455	MIMI	89898989	3	\N
56	2020-03-26	22	40000	NENE SAVANE	76767676	1	\N
57	2020-03-26	22	30000	HOHO	32323232	2	\N
58	2020-03-26	21	30000	DODO	22112233	1	\N
\.


--
-- Data for Name: personnels; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.personnels (id_p, prenom, nom, adresse, tel1, tel2, salaire, id_cl, id_cat) FROM stdin;
16	TRAORE	HAMZA	Korofina	77881122	9099887	140000	19	1
17	TOURE	IBRAHIM	Fana	77881122	9099887	140000	24	4
18	YOUSSOUF	SISSOKO	Kati	78787878	98989898	150000	19	1
19	SANOGO	LEILA	Faladie Sema	6767676	98989898	45000	19	1
\.


--
-- Data for Name: tuteurs; Type: TABLE DATA; Schema: public; Owner: abdallah
--

COPY public.tuteurs (id_tu, nom_tu, adresse, tel1, tel2) FROM stdin;
6	MOHAMED SYLLA	FALADIE	778865544	0087654
7	KARIM FOMBA	SEGOU	66160123	90904699
10	TEKETE COUMBA	YOUSSOUF	988765544	9865433
11	MOHAMED COULIBALY	SIKASSO	88776611	99006655
12	SEKOU DIAWARA	SABALIBOUGOU	889767544	007654867
13	YAHYA SONKE	HAMD ACI 2000	98765433	5567899998
\.


--
-- Name: achats_id_ac_seq; Type: SEQUENCE SET; Schema: public; Owner: kone
--

SELECT pg_catalog.setval('public.achats_id_ac_seq', 15, true);


--
-- Name: categories_id_cat_seq; Type: SEQUENCE SET; Schema: public; Owner: kone
--

SELECT pg_catalog.setval('public.categories_id_cat_seq', 4, true);


--
-- Name: classes_id_cl_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.classes_id_cl_seq', 78, true);


--
-- Name: contenu_acha_id_cac_seq; Type: SEQUENCE SET; Schema: public; Owner: kone
--

SELECT pg_catalog.setval('public.contenu_acha_id_cac_seq', 1, true);


--
-- Name: depenses_id_dep_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.depenses_id_dep_seq', 50, true);


--
-- Name: eleves_id_el_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.eleves_id_el_seq', 27, true);


--
-- Name: fournisseurs_id_fo_seq; Type: SEQUENCE SET; Schema: public; Owner: kone
--

SELECT pg_catalog.setval('public.fournisseurs_id_fo_seq', 55, true);


--
-- Name: inscriptions_id_ins_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.inscriptions_id_ins_seq', 7, true);


--
-- Name: mois_id_dt_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.mois_id_dt_seq', 12, true);


--
-- Name: parcours_id_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.parcours_id_seq', 1, false);


--
-- Name: pay_per_id_pa_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.pay_per_id_pa_seq', 38, true);


--
-- Name: payements_id_pay_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.payements_id_pay_seq', 58, true);


--
-- Name: personnels_id_p_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.personnels_id_p_seq', 21, true);


--
-- Name: tuteurs_id_tu_seq; Type: SEQUENCE SET; Schema: public; Owner: abdallah
--

SELECT pg_catalog.setval('public.tuteurs_id_tu_seq', 14, true);


--
-- Name: classes cl_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT cl_pkey PRIMARY KEY (id_cl);


--
-- Name: classes cl_unik; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT cl_unik UNIQUE (nom_cl);


--
-- Name: depenses dep_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.depenses
    ADD CONSTRAINT dep_pkey PRIMARY KEY (id_dep);


--
-- Name: eleves el_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.eleves
    ADD CONSTRAINT el_pkey PRIMARY KEY (id_el);


--
-- Name: eleves el_unik; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.eleves
    ADD CONSTRAINT el_unik UNIQUE (nom_el, prenom_el, date_nais);


--
-- Name: inscriptions ins_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.inscriptions
    ADD CONSTRAINT ins_pkey PRIMARY KEY (id_ins);


--
-- Name: achats p_acha_key; Type: CONSTRAINT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.achats
    ADD CONSTRAINT p_acha_key PRIMARY KEY (id_ac);


--
-- Name: contenu_acha p_cont_key; Type: CONSTRAINT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.contenu_acha
    ADD CONSTRAINT p_cont_key PRIMARY KEY (id_cac);


--
-- Name: fournisseurs p_four_key; Type: CONSTRAINT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.fournisseurs
    ADD CONSTRAINT p_four_key PRIMARY KEY (id_fo);


--
-- Name: calendriers p_key; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.calendriers
    ADD CONSTRAINT p_key PRIMARY KEY (id_d);


--
-- Name: pay_per pa_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.pay_per
    ADD CONSTRAINT pa_pkey PRIMARY KEY (id_pa);


--
-- Name: parcours par_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.parcours
    ADD CONSTRAINT par_pkey PRIMARY KEY (id);


--
-- Name: payements pay_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.payements
    ADD CONSTRAINT pay_pkey PRIMARY KEY (id_pay);


--
-- Name: categories pcat_key; Type: CONSTRAINT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT pcat_key PRIMARY KEY (id_cat);


--
-- Name: personnels per_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.personnels
    ADD CONSTRAINT per_pkey PRIMARY KEY (id_p);


--
-- Name: personnels per_unik; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.personnels
    ADD CONSTRAINT per_unik UNIQUE (prenom, nom, tel1);


--
-- Name: tuteurs tu_pkey; Type: CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.tuteurs
    ADD CONSTRAINT tu_pkey PRIMARY KEY (id_tu);


--
-- Name: personnels cat_fkey; Type: FK CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.personnels
    ADD CONSTRAINT cat_fkey FOREIGN KEY (id_cat) REFERENCES public.categories(id_cat);


--
-- Name: eleves classe_fkey; Type: FK CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.eleves
    ADD CONSTRAINT classe_fkey FOREIGN KEY (id_cl) REFERENCES public.classes(id_cl) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: personnels classe_fkey; Type: FK CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.personnels
    ADD CONSTRAINT classe_fkey FOREIGN KEY (id_cl) REFERENCES public.classes(id_cl);


--
-- Name: pay_per date_fkey; Type: FK CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.pay_per
    ADD CONSTRAINT date_fkey FOREIGN KEY (id_d) REFERENCES public.calendriers(id_d);


--
-- Name: payements eleve_fkey; Type: FK CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.payements
    ADD CONSTRAINT eleve_fkey FOREIGN KEY (id_el) REFERENCES public.eleves(id_el);


--
-- Name: contenu_acha f_acha_key; Type: FK CONSTRAINT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.contenu_acha
    ADD CONSTRAINT f_acha_key FOREIGN KEY (id_ac) REFERENCES public.achats(id_ac) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: achats f_four_key; Type: FK CONSTRAINT; Schema: public; Owner: kone
--

ALTER TABLE ONLY public.achats
    ADD CONSTRAINT f_four_key FOREIGN KEY (id_fo) REFERENCES public.fournisseurs(id_fo);


--
-- Name: payements mois_fkey; Type: FK CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.payements
    ADD CONSTRAINT mois_fkey FOREIGN KEY (id_d) REFERENCES public.calendriers(id_d);


--
-- Name: parcours par_fkey; Type: FK CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.parcours
    ADD CONSTRAINT par_fkey FOREIGN KEY (id_el) REFERENCES public.eleves(id_el) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: eleves tuteur_key; Type: FK CONSTRAINT; Schema: public; Owner: abdallah
--

ALTER TABLE ONLY public.eleves
    ADD CONSTRAINT tuteur_key FOREIGN KEY (id_tu) REFERENCES public.tuteurs(id_tu) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

