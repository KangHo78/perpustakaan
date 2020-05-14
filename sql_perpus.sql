--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.15
-- Dumped by pg_dump version 11.1

-- Started on 2020-05-14 22:13:20

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2073 (class 0 OID 681799)
-- Dependencies: 183
-- Data for Name: log_history; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.log_history VALUES (1, 'THE KANE CHRONICLES #3 : THE SERPENTS SHADOW', 'BK/0514/00001', 'MASTER BUKU', 'CREATE', 'admin', '2020-05-14 10:48:54');


--
-- TOC entry 2070 (class 0 OID 673607)
-- Dependencies: 180
-- Data for Name: m_buku; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_buku VALUES (1, 'BK/0514/00001', '978-1423140573', 3, 2, 2, 1, 1, 'admin', '2020-05-14 10:48:54', 'THE KANE CHRONICLES #3 : THE SERPENTS SHADOW', 'Apophis, sang Kekacauan, kembali mengancam. Seluruh dunia akan dibawa ke dalam kegelapan abadi. Carter dan Sadie Kane kini kembali mendapatkan sebuah tugas yang hampir mustahil: membunuh Apophis. Satu-satunya mantra sihir kuno yang bisa menghentikan Apophis telah hilang ratusan tahun lalu. Kane Bersaudara harus mengandalkan hantu pembunuh yang tak bisa dipercaya…', 'DIPINJAM', 'YA');


--
-- TOC entry 2067 (class 0 OID 673583)
-- Dependencies: 177
-- Data for Name: m_kategori; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_kategori VALUES (1, 'Horror');
INSERT INTO public.m_kategori VALUES (2, 'SCi-Fi');
INSERT INTO public.m_kategori VALUES (3, 'Fantasy');


--
-- TOC entry 2065 (class 0 OID 673568)
-- Dependencies: 175
-- Data for Name: m_penerbit; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_penerbit VALUES (1, 'Jl. Kalibata Tengah No. 1GH, Pasar Minggu, Jakarta Selatan', 'Eureka Books', '087888337555');
INSERT INTO public.m_penerbit VALUES (2, '125 West End Ave, New York, NY 10023, United States', 'Disney Publishing Worldwide (DPW)', '818.560.6226 ');


--
-- TOC entry 2066 (class 0 OID 673577)
-- Dependencies: 176
-- Data for Name: m_pengarang; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_pengarang VALUES (1, '5454 I 55 N, Jackson, Mississippi 39211', 'J.K. Rowling', '(1 202) 707 3000');
INSERT INTO public.m_pengarang VALUES (2, '125 West End Avenue, 3rd Floor

New York, NY 10023

', 'RICK RIORDAN', '-');


--
-- TOC entry 2064 (class 0 OID 665385)
-- Dependencies: 174
-- Data for Name: m_previleges; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_previleges VALUES (1, 'ADMINISTRATOR');
INSERT INTO public.m_previleges VALUES (2, 'USER');
INSERT INTO public.m_previleges VALUES (3, 'STAFF');
INSERT INTO public.m_previleges VALUES (4, 'DOSEN');
INSERT INTO public.m_previleges VALUES (5, 'MAHASISWA');


--
-- TOC entry 2068 (class 0 OID 673589)
-- Dependencies: 178
-- Data for Name: m_rak_buku; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_rak_buku VALUES (1, 'A-0001', 'RAK BUKU FIKSI ILMIAH', 'LOBBY');


--
-- TOC entry 2069 (class 0 OID 673595)
-- Dependencies: 179
-- Data for Name: m_rak_buku_dt; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_rak_buku_dt VALUES (1, 1, 'A-0001-01');
INSERT INTO public.m_rak_buku_dt VALUES (2, 1, 'A-0001-02');
INSERT INTO public.m_rak_buku_dt VALUES (3, 1, 'A-0001-03');


--
-- TOC entry 2071 (class 0 OID 673613)
-- Dependencies: 181
-- Data for Name: t_peminjaman; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.t_peminjaman VALUES (1, 'PJ/0514/00001', 1, 1, 1, '2020-05-15', '2020-06-05', '1461800028', '2020-05-15 10:42:17', NULL);
INSERT INTO public.t_peminjaman VALUES (2, 'PJ/0514/00001', 1, 2, 1, '2020-05-15', '2020-06-05', '146180028', '2020-05-15 10:42:17', NULL);


--
-- TOC entry 2072 (class 0 OID 673616)
-- Dependencies: 182
-- Data for Name: t_pengembalian; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.t_pengembalian VALUES (1, 'PG/0520/00001', 1, 2, 1, '2020-05-20', '1461800028', NULL);


--
-- TOC entry 2063 (class 0 OID 665377)
-- Dependencies: 173
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users VALUES (2, 'Den', 'den@admin.com', '$2y$10$VWUI9FuSBFJst5FVr3AKputwURR2kG2FLERvMZi6hzyriDobltqpi', NULL, '2020-05-01 00:42:17', '2020-05-01 00:42:17', 4, 'MHS/0501/00002', 'Jl. Semolowaru No.45', '(031) 5931800', '08214016', 'stograge/app/user/2.jpg', '1461800028', '1461800028');
INSERT INTO public.users VALUES (1, 'admin', 'admin@admin.com', '$2y$10$VWUI9FuSBFJst5FVr3AKputwURR2kG2FLERvMZi6hzyriDobltqpi', NULL, '2020-05-01 00:42:17', '2020-05-01 00:42:17', 1, 'ADM/0501/00001', NULL, NULL, NULL, NULL, NULL, 'admin');


-- Completed on 2020-05-14 22:13:21

--
-- PostgreSQL database dump complete
--

