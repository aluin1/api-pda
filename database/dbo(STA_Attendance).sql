/*
 Navicat Premium Data Transfer

 Source Server         : STA
 Source Server Type    : SQL Server
 Source Server Version : 14002002
 Source Host           : localhost:1433
 Source Catalog        : STA_attendance
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 14002002
 File Encoding         : 65001

 Date: 04/04/2019 11:47:30
*/


-- ----------------------------
-- Table structure for STA_Log
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[STA_Log]') AND type IN ('U'))
	DROP TABLE [dbo].[STA_Log]
GO

CREATE TABLE [dbo].[STA_Log] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Location] geography  NOT NULL,
  [timing] datetime  NOT NULL,
  [Id_user] int  NULL
)
GO

ALTER TABLE [dbo].[STA_Log] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of STA_Log
-- ----------------------------
SET IDENTITY_INSERT [dbo].[STA_Log] ON
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'158', N'POINT (106.810853600000002 -6.1857021)', N'2019-03-21 11:43:41.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'160', N'POINT (106.815328800000003 -6.2056162)', N'2019-03-21 11:44:21.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'161', N'POINT (106.815328800000003 -6.2056162)', N'2019-03-21 11:44:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'162', N'POINT (106.810853600000002 -6.1857021)', N'2019-03-21 11:44:57.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'164', N'POINT (106.815328800000003 -6.2056162)', N'2019-03-22 18:36:06.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'165', N'POINT (106.818127899999993 -6.2087463)', N'2019-03-22 19:13:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'166', N'POINT (106.818426666670007 -6.2103283333333)', N'2019-03-22 19:21:02.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'167', N'POINT (106.818136999999993 -6.2087575)', N'2019-03-22 20:33:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'168', N'POINT (106.818136999999993 -6.2087575)', N'2019-03-22 20:33:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'169', N'POINT (106.818130400000001 -6.2087492)', N'2019-03-22 20:34:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'170', N'POINT (106.818130400000001 -6.2087492)', N'2019-03-22 20:34:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'171', N'POINT (106.8181309 -6.2087496)', N'2019-03-22 20:40:03.000', N'2040')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'172', N'POINT (106.818145999999999 -6.2083138)', N'2019-03-22 20:41:43.000', N'2040')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'173', N'POINT (106.818111299999998 -6.20876974)', N'2019-03-22 20:42:31.000', N'2040')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'174', N'POINT (106.818130300000007 -6.208749)', N'2019-03-22 20:57:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'175', N'POINT (106.818130300000007 -6.208749)', N'2019-03-22 20:57:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'176', N'POINT (106.818127899999993 -6.2087463)', N'2019-03-22 20:59:02.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'177', N'POINT (106.818130100000005 -6.2087488)', N'2019-03-22 21:09:48.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'178', N'POINT (106.818127899999993 -6.2087463)', N'2019-03-22 21:31:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'179', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 14:40:08.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'180', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 14:46:00.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'181', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 14:47:25.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'182', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 14:48:14.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'183', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 14:48:51.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'184', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 14:49:42.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'185', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 14:51:24.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'186', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 14:53:55.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'187', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 14:55:34.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'188', N'POINT (106.816199299999994 -6.2088913)', N'2019-03-27 14:56:12.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'189', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 14:56:57.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'190', N'POINT (106.816199299999994 -6.2088913)', N'2019-03-27 14:57:04.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'191', N'POINT (106.818387999999999 -6.2088966)', N'2019-03-27 14:58:52.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'192', N'POINT (106.818387999999999 -6.2088966)', N'2019-03-27 15:02:17.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'193', N'POINT (106.818387999999999 -6.2088966)', N'2019-03-27 15:02:43.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'194', N'POINT (106.818387999999999 -6.2088966)', N'2019-03-27 15:02:47.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'195', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:03:33.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'196', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:08:05.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'197', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:08:24.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'198', N'POINT (106.818387999999999 -6.2088966)', N'2019-03-27 15:12:37.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'199', N'POINT (106.818387999999999 -6.2088966)', N'2019-03-27 15:14:54.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'200', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:15:01.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'201', N'POINT (106.818387999999999 -6.2088966)', N'2019-03-27 15:17:38.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'202', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:45:10.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'203', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 15:45:53.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'204', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 15:46:21.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'205', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 15:48:48.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'206', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 15:48:52.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'207', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:49:02.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'208', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:51:12.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'209', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:51:30.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'210', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:51:49.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'211', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:52:08.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'212', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:52:56.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'213', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:53:42.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'214', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:53:52.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'215', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:55:09.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'216', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:55:55.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'217', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 15:56:25.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'218', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 15:56:45.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'219', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:57:00.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'220', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:58:58.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'221', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:59:35.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'222', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:59:38.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'223', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 15:59:52.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'224', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:00:05.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'225', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:01:13.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'226', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:03:53.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'227', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:04:22.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'228', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:04:37.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'229', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:04:49.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'230', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:06:02.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'231', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:06:22.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'232', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:06:58.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'233', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:08:56.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'234', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:09:06.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'235', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:09:14.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'236', N'POINT (106.815328800000003 -6.2056162)', N'2019-03-27 16:09:21.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'237', N'POINT (106.815328800000003 -6.2056162)', N'2019-03-27 16:09:30.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'238', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:09:43.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'239', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:10:34.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'240', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:13:01.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'241', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:13:23.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'242', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:13:34.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'243', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:13:46.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'244', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:14:00.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'245', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:14:07.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'246', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:18:21.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'247', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:18:25.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'248', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:18:34.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'249', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:18:47.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'250', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:18:51.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'251', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:18:57.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'252', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:19:11.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'253', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 16:19:21.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'254', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:19:42.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'255', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 16:20:10.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'256', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 19:24:31.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'257', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 19:33:52.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'258', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 19:34:33.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'259', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 20:04:58.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'260', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 20:12:47.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'261', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 20:14:22.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'262', N'POINT (106.818087399999996 -6.2093065)', N'2019-03-27 20:14:33.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'263', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 20:14:58.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'264', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-27 20:15:14.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'265', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-28 11:35:56.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'266', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-28 11:59:51.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'267', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:22:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'268', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:22:54.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'269', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:23:02.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'270', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:23:04.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'271', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:23:06.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'272', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:23:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'273', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:23:30.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'274', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:23:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'275', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:23:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'276', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:23:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'277', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:25:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'278', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:25:21.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'279', N'POINT (106.747756300000006 -6.3876732)', N'2019-03-29 11:25:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1265', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:15:11.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1266', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:15:11.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1267', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:15:41.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1268', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:15:41.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1269', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:15:58.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1270', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:15:59.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1271', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:16:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1272', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:16:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1273', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:16:45.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1274', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:16:45.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1275', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:16:58.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1276', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:16:58.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1277', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:17:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1278', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:17:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1279', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:17:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1280', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:17:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1281', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:17:59.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1282', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:17:59.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1283', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:18:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1284', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:18:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1285', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:18:44.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1286', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:18:44.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1287', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:19:04.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1288', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:19:04.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1289', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:19:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1290', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:19:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1291', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:19:45.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1292', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:19:45.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1293', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:20:09.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1294', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:20:09.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1295', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:20:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1296', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:20:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1297', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:20:57.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1298', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:20:57.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1299', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:21:23.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1300', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 12:21:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1301', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:00:01.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1302', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:00:01.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1303', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:00:21.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1304', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:00:21.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1305', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:00:51.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1306', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:00:51.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1307', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:01:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1308', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:01:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1309', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:01:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1310', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:01:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1311', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:01:46.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1312', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:01:46.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1313', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:02:06.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1314', N'POINT (107.167725099999998 -6.248012)', N'2019-03-30 13:02:06.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1315', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:30:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1316', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:30:45.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1317', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:31:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1318', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:31:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1319', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:31:47.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1320', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:32:07.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1321', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:32:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1322', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:32:47.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1323', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:33:07.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1324', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:33:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1325', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:33:49.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1326', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:34:13.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1327', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:34:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1328', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:34:55.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1329', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:35:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1330', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:35:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1331', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:36:04.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1332', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:36:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1333', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:36:46.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1334', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:37:06.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1335', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:37:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1336', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:37:48.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1337', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:38:07.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1338', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:38:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1339', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:38:48.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1340', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:39:08.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1341', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:39:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1342', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:39:49.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1343', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:40:10.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1344', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:40:30.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1345', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:40:50.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1346', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:41:15.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1347', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:41:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1348', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:41:56.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1349', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:42:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1350', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:42:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1351', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:42:57.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1352', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:43:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1353', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:43:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1354', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:44:00.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1355', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:44:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1356', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:44:45.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1357', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:45:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1358', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:45:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1359', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:45:46.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1360', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:46:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1361', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:46:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1362', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:46:46.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1363', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:47:07.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1364', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:47:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1365', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:47:48.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1366', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:48:09.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1367', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:48:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1368', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:48:48.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1369', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:49:08.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1370', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:49:33.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1371', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:49:53.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1372', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:50:14.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1373', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:50:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1374', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:50:59.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1375', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:51:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1376', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:51:45.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1377', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:52:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1378', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:52:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1379', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:52:45.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1380', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:53:06.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1381', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:53:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1382', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:53:46.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1383', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:54:06.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1384', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:54:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1385', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:54:47.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1386', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:55:07.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1387', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:55:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1388', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:55:48.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1389', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:56:08.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1390', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:56:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1391', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 07:56:48.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1392', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1393', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1394', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1395', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1396', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1397', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1398', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:14.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1399', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:14.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1400', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:14.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1401', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:14.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1402', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:14.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1403', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:15.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1404', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:15.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1405', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:15.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1406', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1407', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1408', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1409', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1410', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1411', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1412', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1413', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1414', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1415', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1416', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1417', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1418', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1419', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1420', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1421', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1422', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1423', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1424', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1425', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1426', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1427', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1428', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:21.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1429', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:21.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1430', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:21.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1431', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:22.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1432', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:22.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1433', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:22.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1434', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:22.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1435', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1436', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1437', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1438', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1439', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1440', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1441', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1442', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1443', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1444', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1445', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1446', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1447', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1448', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1449', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1450', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:29.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1451', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:29.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1452', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:29.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1453', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:29.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1454', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:29.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1455', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:30.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1456', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1457', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1458', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1459', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1460', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1461', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1462', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1463', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:32.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1464', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:32.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1465', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:33.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1466', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:33.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1467', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:33.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1468', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:23:49.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1469', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:24:09.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1470', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:24:29.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1471', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:24:50.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1472', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:25:13.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1473', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:25:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1474', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:25:57.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1475', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:26:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1476', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:26:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1477', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:26:57.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1478', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:27:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1479', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:27:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1480', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:27:59.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1481', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:28:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1482', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:28:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1483', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:28:59.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1484', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:29:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1485', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:29:44.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1486', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:30:04.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1487', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1488', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1489', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1490', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1491', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1492', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1493', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1494', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1495', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1496', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1497', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1498', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1499', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1500', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1501', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1502', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1503', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1504', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1505', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:41.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1506', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:41.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1507', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:41.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1508', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:42.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1509', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:42.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1510', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:42.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1511', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:42.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1512', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:42.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1513', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:43.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1514', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:43.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1515', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:39:59.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1516', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:40:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1517', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:40:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1518', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:41:00.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1519', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:41:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1520', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:41:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1521', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:42:00.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1522', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:42:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1523', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:42:41.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1524', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:43:01.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1525', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:43:22.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1526', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:43:42.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1527', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:44:02.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1528', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 08:44:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1529', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1530', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1531', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1532', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1533', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:06.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1534', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:07.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1535', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:07.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1536', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:07.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1537', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:08.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1538', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:08.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1539', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:08.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1540', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:08.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1541', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:08.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1542', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:09.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1543', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:09.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1544', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:09.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1545', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:10.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1546', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:10.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1547', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:11.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1548', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:11.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1549', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:11.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1550', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:11.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1551', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:11.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1552', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:11.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1553', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1554', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1555', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1556', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1557', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:12.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1558', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:13.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1559', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:13.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1560', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:13.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1561', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:13.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1562', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:13.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1563', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:14.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1564', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:14.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1565', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:15.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1566', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:15.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1567', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:15.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1568', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1569', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1570', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1571', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1572', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1573', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1574', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:18.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1575', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1576', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1577', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1578', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1579', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1580', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:20.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1581', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:22.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1582', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:23.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1583', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:24.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1584', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:25.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1585', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1586', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1587', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1588', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1589', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:28.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1590', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:29.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1591', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:30.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1592', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1593', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1594', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:32.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1595', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:32.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1596', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:32.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1597', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:33.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1598', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:33.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1599', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:33.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1600', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:33.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1601', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1602', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1603', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1604', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1605', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1606', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1607', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:35.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1608', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:35.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1609', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1610', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1611', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1612', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1613', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1614', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:37.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1615', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1616', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1617', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1618', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1619', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:38.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1620', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:39.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1621', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1622', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1623', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1624', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1625', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1626', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1627', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:42.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1628', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:44.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1629', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:19:53.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1630', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:20:23.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1631', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:20:44.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1632', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:21:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1633', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:21:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1634', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:21:58.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1635', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:22:19.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1636', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:22:40.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1637', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:23:03.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1638', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:23:26.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1639', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:23:59.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1640', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 09:24:31.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1641', N'POINT (107.168155900000002 -6.2488789)', N'2019-03-31 09:24:57.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1642', N'POINT (107.177485500000003 -6.249789)', N'2019-03-31 09:25:42.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1643', N'POINT (107.169883499999997 -6.249497)', N'2019-03-31 09:26:03.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1644', N'POINT (107.169394800000006 -6.2516319)', N'2019-03-31 09:26:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1645', N'POINT (107.170325199999994 -6.2530892)', N'2019-03-31 09:28:53.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1646', N'POINT (107.175451199999998 -6.2536605)', N'2019-03-31 09:31:36.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1647', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:08:57.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1648', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:09:16.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1649', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:09:17.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1650', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:09:44.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1651', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:10:01.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1652', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:10:21.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1653', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:10:41.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1654', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:11:10.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1655', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:11:34.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1656', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:11:50.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1657', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:12:05.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1658', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:12:27.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1659', N'POINT (107.167725099999998 -6.248012)', N'2019-03-31 11:12:48.000', N'37')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1672', N'POINT (106.747756300000006 -6.3876732)', N'2019-04-01 10:49:22.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1673', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 10:59:35.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1674', N'POINT (106.747756300000006 -6.3876732)', N'2019-04-01 11:00:06.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1675', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 11:00:13.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1676', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 11:00:17.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1677', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 11:00:21.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1678', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 11:09:47.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1679', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 11:09:52.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1680', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 11:12:44.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1681', N'POINT (106.747756300000006 -6.3876732)', N'2019-04-01 11:15:33.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1682', N'POINT (106.747756300000006 -6.3876732)', N'2019-04-01 11:16:00.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1683', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 11:16:06.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1684', N'POINT (106.816210499999997 -6.209024)', N'2019-04-01 11:16:12.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1685', N'POINT (106.747756300000006 -6.3876732)', N'2019-04-01 11:16:19.000', N'17')
GO

INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1686', N'POINT (106.747756300000006 -6.3876732)', N'2019-04-01 11:16:22.000', N'17')
GO

SET IDENTITY_INSERT [dbo].[STA_Log] OFF
GO


-- ----------------------------
-- Table structure for STA_OfficeLocation
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[STA_OfficeLocation]') AND type IN ('U'))
	DROP TABLE [dbo].[STA_OfficeLocation]
GO

CREATE TABLE [dbo].[STA_OfficeLocation] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Id_User] int  NULL,
  [office_name] varchar(255) COLLATE Latin1_General_CI_AS  NULL,
  [last_edited] datetime  NULL,
  [Location] geography  NOT NULL
)
GO

ALTER TABLE [dbo].[STA_OfficeLocation] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of STA_OfficeLocation
-- ----------------------------
SET IDENTITY_INSERT [dbo].[STA_OfficeLocation] ON
GO

INSERT INTO [dbo].[STA_OfficeLocation] ([Id], [Id_User], [office_name], [last_edited], [Location]) VALUES (N'34', N'0', N'STA Sudirman', N'2019-04-01 10:39:45.000', N'POINT (106.818387999999999 -6.2088966)')
GO

SET IDENTITY_INSERT [dbo].[STA_OfficeLocation] OFF
GO


-- ----------------------------
-- Table structure for STA_Users
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[STA_Users]') AND type IN ('U'))
	DROP TABLE [dbo].[STA_Users]
GO

CREATE TABLE [dbo].[STA_Users] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [username] varchar(200) COLLATE Latin1_General_CI_AS  NOT NULL,
  [password] varchar(200) COLLATE Latin1_General_CI_AS  NOT NULL,
  [role] varchar(50) COLLATE Latin1_General_CI_AS DEFAULT ('user') NOT NULL,
  [last_login] datetime DEFAULT ('0000-00-00 00:00:00') NULL,
  [platform] varchar(250) COLLATE Latin1_General_CI_AS  NULL,
  [token] text COLLATE Latin1_General_CI_AS  NULL,
  [full_name] varchar(250) COLLATE Latin1_General_CI_AS  NULL,
  [email] varchar(250) COLLATE Latin1_General_CI_AS  NULL,
  [nohp] varchar(250) COLLATE Latin1_General_CI_AS  NULL,
  [title] varchar(250) COLLATE Latin1_General_CI_AS  NULL,
  [status] varchar(50) COLLATE Latin1_General_CI_AS DEFAULT ('active') NOT NULL,
  [created_at] datetime  NULL,
  [nip] varchar(250) COLLATE Latin1_General_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[STA_Users] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of STA_Users
-- ----------------------------
SET IDENTITY_INSERT [dbo].[STA_Users] ON
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'1', N'faisalas', N'password', N'admin', NULL, N'android', N'ASDASDAS', N'mUHAMMAD FAISAL', N'faisanworkmail@gmail.com', N'8912', N'ceo', N'active', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'16', N'paisal', N'40f76a99081962bf657df2c0b7e0e13e', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'faisalormail@gmail.com', N'99762129', N'programmer', N'inactive', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'17', N'faisal', N'f4668288fdbf9773dd9779d412942905', N'admin', N'2019-04-02 16:29:45.000', N'Operating System : Unknown OS Platform Browser : Unknown Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTcsIm5pcCI6IjIxNTM0NTQ0MDQiLCJub2hwIjoiMDgxMjk5NzYyMTI5IiwidXNlcm5hbWUiOiJmYWlzYWwiLCJyb2xlIjoiYWRtaW4iLCJ0aXRsZSI6InByb2dyYW1tZXIiLCJzdGF0dXMiOiJhY3RpdmUiLCJmdWxsX25hbWUiOiJNdWhhbW1hZCBGYWlzYWwiLCJ0aW1lX2xvZ2luIjoiMjAxOS0wNC0wMiAxNjoyOTo0NSIsInRpbWUiOjE1NTQxOTczODV9.oNuGqeAGxgzEt8Ga8M4ftt3K3QhHb_1hEkd5l1kBea4', N'Muhammad Faisal', N'faisal@gmail.com', N'081299762129', N'programmer', N'active', NULL, N'2153454404')
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'21', N'faislal', N'few23fvbaisas112e1al', N'admin', NULL, NULL, NULL, N'Muhammad Faisal Budiman', N'budiman@budiman.com', N'769', N'owner', N'active', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'24', N'faisal99', N'f4668288fdbf9773dd9779d412942905', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'26', N'faisal299', N'f4668288fdbf9773dd9779d412942905', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'27', N'faisal3299', N'f4668288fdbf9773dd9779d412942905', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'29', N'faisalganteng', N'faisalkaya', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'30', N'faisal32s99', N'f4668288fdbf9773dd9779d412942905', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'31', N'faisal32sa99', N'f4668288fdbf9773dd9779d412942905', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'32', N'cangganteng', N'f4668288fdbf9773dd9779d412942905', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'cangganteng@gmail.com', N'08961212', N'programmer', N'inactive', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'37', N'arulajeh', N'3faea069be64139f17e53f4a8742effd', N'user', N'2019-03-31 07:29:56.000', N'Operating System : Android Browser : Handheld Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MzcsInVzZXJuYW1lIjoiYXJ1bGFqZWgiLCJyb2xlIjoidXNlciIsImZ1bGxfbmFtZSI6IlN5YWhydWxsb2giLCJ0aW1lX2xvZ2luIjoiMjAxOS0wMy0zMSAwNzoyOTo1NiIsInRpbWUiOjE1NTM5OTIxOTZ9.soW5yduEWh4x_Zm257oq8VlAHFfgg3FTqCAg3D7gELY', N'Syahrulloh', N'arulajeh@gmail.com', N'089988999888', N'Numpang lewat', N'active', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'1036', N'diana', N'3a23bb515e06d0e944ff916e79a7775c', N'user', N'2019-04-02 10:45:58.000', N'Operating System : Unknown OS Platform Browser : Unknown Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTAzNiwibmlwIjoiMTIzNzc2NTgyMzQiLCJub2hwIjoiMDgxMjk5NzYyMTI5IiwidXNlcm5hbWUiOiJkaWFuYSIsInJvbGUiOiJ1c2VyIiwidGl0bGUiOiJwcm9ncmFtbWVyIiwic3RhdHVzIjoiYWN0aXZlIiwiZnVsbF9uYW1lIjoiRGlhbmEgZ2FudGVuZyIsInRpbWVfbG9naW4iOiIyMDE5LTA0LTAyIDEwOjQ1OjU4IiwidGltZSI6MTU1NDE3Njc1OH0.v4ilq9-WIt8DajAQXhGNj4bGzbvG5DrZ2G_DeuIcWJE', N'Diana ganteng', N'diana@gmail.com', N'081299762129', N'programmer', N'active', NULL, N'12377658234')
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'1037', N'mfbudiman', N'219dc66087d55a2d2ca422a4085cd50c', N'admin', NULL, NULL, NULL, N'Muhammad Faisal Budiman', N'fasisal@gmail.com', N'081299762129', N'programmer', N'active', NULL, NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'1038', N'budimanmf', N'450258f865dce55ade3f351aa691bcd9', N'admin', NULL, NULL, NULL, N'Muhammad Faisal Budiman', N'fasisal@gmail.com', N'081299762129', N'programmer', N'active', N'2019-03-20 16:37:54.000', NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'1039', N'bagus', N'17b38fc02fd7e92f3edeb6318e3066d8', N'admin', N'2019-03-31 20:39:49.000', N'Operating System : Unknown OS Platform Browser : Unknown Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTAzOSwidXNlcm5hbWUiOiJiYWd1cyIsInJvbGUiOiJhZG1pbiIsImZ1bGxfbmFtZSI6IkJhZ3VzIiwidGltZV9sb2dpbiI6IjIwMTktMDMtMzEgMjA6Mzk6NDkiLCJ0aW1lIjoxNTU0MDM5NTg5fQ.1v_tMYv63JCb_SNGVd2_BDnIACcz85GfAlNvKy1vIV8', N'Bagus', N'bagus@gmail.com', N'0812121221', N'Lead Team', N'active', N'2019-03-22 14:05:26.000', NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'2040', N'juned', N'efe6398127928f1b2e9ef3207fb82663', N'admin', N'2019-03-22 20:38:26.000', N'Operating System : Android Browser : Handheld Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MjA0MCwidXNlcm5hbWUiOiJqdW5lZCIsInJvbGUiOiJhZG1pbiIsImZ1bGxfbmFtZSI6Ikp1bmVkIiwidGltZV9sb2dpbiI6IjIwMTktMDMtMjIgMjA6Mzg6MjYiLCJ0aW1lIjoxNTUzMjYxOTA2fQ.lFAGptv8S-UVsk5onTJWhc-SJeKTBIq4mxniSdUMgKU', N'Juned', N'juned@gmail.com', N'081299762129', N'consultant', N'active', N'2019-03-22 19:52:40.000', NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'2041', N'ncang', N'5a78097cec7d3573af1af56694a0e326', N'admin', NULL, NULL, NULL, N'Faisal Budiman', N'ncang@gmail.com', N'081299762129', N'programmer', N'active', N'2019-03-27 19:14:32.000', NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'2043', N'user90', N'24c9e15e52afc47c225b757e7bee1f9d', N'user', NULL, NULL, NULL, N'User1', N'user90@gmail.com', N'0895', N'cuma user', N'active', N'2019-03-31 20:25:48.000', NULL)
GO

INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at], [nip]) VALUES (N'2044', N'budi', N'00dfc53ee86af02e742515cdcf075ed3', N'user', N'2019-04-01 14:41:20.000', N'Operating System : Unknown OS Platform Browser : Unknown Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MjA0NCwibmlwIjoiMTIyMjEyNDUxMjEyIiwibm9ocCI6IjA4MTI5OTc2MjEyOSIsInVzZXJuYW1lIjoiYnVkaSIsInJvbGUiOiJ1c2VyIiwiZnVsbF9uYW1lIjoiQnVkaSBpbWFuIiwidGltZV9sb2dpbiI6IjIwMTktMDQtMDEgMTQ6NDE6MjAiLCJ0aW1lIjoxNTU0MTA0NDgwfQ.UpqUTcSKKqUcuzQT718WdeBub09zb6Ftg1aFUnW5T_A', N'Budi iman', N'budi@gmail.com', N'081299762129', N'programmer', N'active', N'2019-04-01 11:39:17.000', N'122212451212')
GO

SET IDENTITY_INSERT [dbo].[STA_Users] OFF
GO


-- ----------------------------
-- Table structure for STA_UsersAttendance
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[STA_UsersAttendance]') AND type IN ('U'))
	DROP TABLE [dbo].[STA_UsersAttendance]
GO

CREATE TABLE [dbo].[STA_UsersAttendance] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Id_User] int  NOT NULL,
  [date_attend] date  NOT NULL,
  [time_come] time(7)  NULL,
  [time_return] time(7)  NULL,
  [time_break] time(7)  NULL,
  [time_end_of_break] time(7)  NULL,
  [note] varchar(255) COLLATE Latin1_General_CI_AS  NULL,
  [mark] varchar(255) COLLATE Latin1_General_CI_AS  NULL,
  [flag] bit  NULL
)
GO

ALTER TABLE [dbo].[STA_UsersAttendance] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of STA_UsersAttendance
-- ----------------------------
SET IDENTITY_INSERT [dbo].[STA_UsersAttendance] ON
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1097', N'37', N'2019-03-29', N'09:22:34.0000000', N'11:22:39.0000000', N'21:30:19.0000000', N'21:30:26.0000000', N'masuk pagi', N'manual attendance', N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1098', N'17', N'2019-03-29', N'07:00:00.0000000', N'17:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1099', N'1039', N'2019-03-29', N'06:00:00.0000000', N'17:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1100', N'1038', N'2019-03-29', N'06:00:00.0000000', N'17:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1106', N'37', N'2019-03-01', N'07:00:00.0000000', N'13:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1107', N'37', N'2019-03-02', N'07:00:00.0000000', N'14:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1108', N'37', N'2019-03-03', N'07:00:00.0000000', N'15:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1109', N'37', N'2019-03-04', N'07:00:00.0000000', N'16:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1110', N'37', N'2019-03-05', N'07:00:00.0000000', N'15:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1111', N'37', N'2019-03-06', N'07:00:00.0000000', N'16:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1112', N'17', N'2019-03-01', N'07:00:00.0000000', N'18:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1113', N'17', N'2019-03-09', N'09:45:00.0000000', N'21:00:00.0000000', NULL, NULL, NULL, NULL, N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'2096', N'37', N'2019-03-30', N'12:01:02.0000000', N'12:01:21.0000000', NULL, NULL, N'n', N'manual attendance', N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'2097', N'1039', N'2019-03-31', N'22:45:42.0000000', N'22:48:08.0000000', NULL, NULL, N'remote', N'manual attendance', N'0')
GO

INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'2105', N'17', N'2019-04-01', N'11:19:39.0000000', N'11:20:07.0000000', NULL, NULL, N'istri minta pulang', N'manual attendance', N'0')
GO

SET IDENTITY_INSERT [dbo].[STA_UsersAttendance] OFF
GO


-- ----------------------------
-- Function structure for whereId
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[whereId]') AND type IN ('FN', 'FS', 'FT', 'IF', 'TF'))
	DROP FUNCTION[dbo].[whereId]
GO

CREATE FUNCTION [dbo].[whereId]   
( 
	@Id_User INT, @jam_masuk TIME(3), @jam_pulang TIME(3), @dari DATE, @sampai DATE
)  
RETURNS TABLE  
	RETURN  (  
			SELECT A.Id_User, B.username, B.full_name, B.nip, A.date_attend, @jam_masuk as jam_masuk, @jam_pulang as jam_pulang, A.time_come, A.time_return, 
				CASE WHEN A.time_come > @jam_masuk THEN
							CONVERT(VARCHAR(8), DATEADD(SECOND, DATEDIFF(SECOND, @jam_masuk, A.time_come),0), 108)
				END as terlambat,
				CASE WHEN A.time_return < @jam_pulang THEN
					CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, A.time_return, @jam_pulang),0), 108)
				END as plg_cpt,
				CASE WHEN time_return > @jam_pulang THEN
					CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, @jam_pulang, A.time_return),0), 108)
				END as lembur,
				CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, A.time_come, A.time_return),0), 108) as jml_hadir,
				CASE WHEN 
					CASE WHEN time_return > @jam_pulang THEN
						CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, @jam_pulang, A.time_return),0), 108)	ELSE CONVERT(TIME, '00:00:00')
					END > CONVERT(TIME, '00:00:00')
					THEN
					CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, @jam_pulang, A.time_return),0), 108), CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, A.time_come, A.time_return),0), 108)),0), 108)
				ELSE
					CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, A.time_come, A.time_return),0), 108)
				END as jam_kerja
			from dbo.STA_UsersAttendance AS A JOIN dbo.STA_Users AS B
			ON (A.Id_User = B.Id)
			WHERE CASE 
				WHEN @Id_User > 0 THEN
					A.Id_User else A.flag
				END
				=
			  CASE WHEN @Id_User > 0 THEN
					@Id_User else 0 
				END
				 AND A.date_attend >= @dari AND A.date_attend <= @sampai
  )
GO


-- ----------------------------
-- Primary Key structure for table STA_Log
-- ----------------------------
ALTER TABLE [dbo].[STA_Log] ADD CONSTRAINT [PK__STA_Tria__6CC851FE6CC2604D] PRIMARY KEY CLUSTERED ([Id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table STA_OfficeLocation
-- ----------------------------
ALTER TABLE [dbo].[STA_OfficeLocation] ADD CONSTRAINT [PK__STA_Offi__906A8648F129EDC1] PRIMARY KEY CLUSTERED ([Id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Uniques structure for table STA_Users
-- ----------------------------
ALTER TABLE [dbo].[STA_Users] ADD CONSTRAINT [Username] UNIQUE NONCLUSTERED ([username] ASC)
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Checks structure for table STA_Users
-- ----------------------------
ALTER TABLE [dbo].[STA_Users] ADD CONSTRAINT [CK__STA_Users__role__32AB8735] CHECK ([role]='user' OR [role]='admin' OR [role]='super_admin')
GO

ALTER TABLE [dbo].[STA_Users] ADD CONSTRAINT [CK__STA_Users__statu__3587F3E0] CHECK ([status]='inactive' OR [status]='active')
GO


-- ----------------------------
-- Primary Key structure for table STA_Users
-- ----------------------------
ALTER TABLE [dbo].[STA_Users] ADD CONSTRAINT [PK__STA_User__3214EC07DD9B70E0] PRIMARY KEY CLUSTERED ([Id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table STA_UsersAttendance
-- ----------------------------
ALTER TABLE [dbo].[STA_UsersAttendance] ADD CONSTRAINT [PK__STA_User__3214EC076E93B15A] PRIMARY KEY CLUSTERED ([Id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

-- Transact-SQL Inline Table-Valued Function Syntax   
CREATE OR ALTER FUNCTION dbo.whereId   
( 
	@Id_User INT, @jam_masuk TIME(3), @jam_pulang TIME(3), @dari DATE, @sampai DATE
)  
RETURNS TABLE  
	RETURN  (  
			SELECT A.Id_User, B.username, B.full_name, A.date_attend, @jam_masuk as jam_masuk, @jam_pulang as jam_pulang, A.time_come, A.time_return, 
				CASE WHEN A.time_come > @jam_masuk THEN
							CONVERT(VARCHAR(8), DATEADD(SECOND, DATEDIFF(SECOND, @jam_masuk, A.time_come),0), 108)
				END as terlambat,
				CASE WHEN A.time_return < @jam_pulang THEN
					CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, A.time_return, @jam_pulang),0), 108)
				END as plg_cpt,
				CASE WHEN time_return > @jam_pulang THEN
					CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, @jam_pulang, A.time_return),0), 108)
				END as lembur,
				CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, A.time_come, A.time_return),0), 108) as jml_hadir,
				CASE WHEN 
					CASE WHEN time_return > @jam_pulang THEN
						CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, @jam_pulang, A.time_return),0), 108)	ELSE CONVERT(TIME, '00:00:00')
					END > CONVERT(TIME, '00:00:00')
					THEN
					CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, @jam_pulang, A.time_return),0), 108), CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, A.time_come, A.time_return),0), 108)),0), 108)
				ELSE
					CONVERT(VARCHAR(8),DATEADD(SECOND, DATEDIFF(SECOND, A.time_come, A.time_return),0), 108)
				END as jam_kerja
			from dbo.STA_UsersAttendance AS A JOIN dbo.STA_Users AS B
			ON (A.Id_User = B.Id)
			WHERE CASE 
				WHEN @Id_User > 0 THEN
					A.Id_User else A.flag
				END
				=
			  CASE WHEN @Id_User > 0 THEN
					@Id_User else 0 
				END
				 AND A.date_attend >= @dari AND A.date_attend <= @sampai
  )   
 ; 

-- SELECT * from dbo.whereId(null,'07:00', '16:00', '2019-01-27', '2019-03-28')