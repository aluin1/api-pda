/*
Navicat SQL Server Data Transfer

Source Server         : STA
Source Server Version : 140000
Source Host           : localhost:1433
Source Database       : STA_attendance
Source Schema         : dbo

Target Server Type    : SQL Server
Target Server Version : 140000
File Encoding         : 65001

Date: 2019-03-31 06:08:42
*/


-- ----------------------------
-- Table structure for STA_Log
-- ----------------------------
DROP TABLE [dbo].[STA_Log]
GO
CREATE TABLE [dbo].[STA_Log] (
[Id] int NOT NULL IDENTITY(1,1) ,
[Location] geography NOT NULL ,
[timing] datetime NOT NULL ,
[Id_user] int NULL 
)


GO
DBCC CHECKIDENT(N'[dbo].[STA_Log]', RESEED, 1314)
GO

-- ----------------------------
-- Records of STA_Log
-- ----------------------------
SET IDENTITY_INSERT [dbo].[STA_Log] ON
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'157', geography::STGeomFromText('POINT (106,8108536 -6,1857021)',4326), N'2019-03-21 11:42:26.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'158', geography::STGeomFromText('POINT (106,8108536 -6,1857021)',4326), N'2019-03-21 11:43:41.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'159', geography::STGeomFromText('POINT (106,8153288 -6,2056162)',4326), N'2019-03-21 11:43:57.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'160', geography::STGeomFromText('POINT (106,8153288 -6,2056162)',4326), N'2019-03-21 11:44:21.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'161', geography::STGeomFromText('POINT (106,8153288 -6,2056162)',4326), N'2019-03-21 11:44:38.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'162', geography::STGeomFromText('POINT (106,8108536 -6,1857021)',4326), N'2019-03-21 11:44:57.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'164', geography::STGeomFromText('POINT (106,8153288 -6,2056162)',4326), N'2019-03-22 18:36:06.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'165', geography::STGeomFromText('POINT (106,8181279 -6,2087463)',4326), N'2019-03-22 19:13:24.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'166', geography::STGeomFromText('POINT (106,81842666667 -6,2103283333333)',4326), N'2019-03-22 19:21:02.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'167', geography::STGeomFromText('POINT (106,818137 -6,2087575)',4326), N'2019-03-22 20:33:25.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'168', geography::STGeomFromText('POINT (106,818137 -6,2087575)',4326), N'2019-03-22 20:33:25.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'169', geography::STGeomFromText('POINT (106,8181304 -6,2087492)',4326), N'2019-03-22 20:34:36.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'170', geography::STGeomFromText('POINT (106,8181304 -6,2087492)',4326), N'2019-03-22 20:34:36.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'171', geography::STGeomFromText('POINT (106,8181309 -6,2087496)',4326), N'2019-03-22 20:40:03.000', N'2040')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'172', geography::STGeomFromText('POINT (106,818146 -6,2083138)',4326), N'2019-03-22 20:41:43.000', N'2040')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'173', geography::STGeomFromText('POINT (106,8181113 -6,20876974)',4326), N'2019-03-22 20:42:31.000', N'2040')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'174', geography::STGeomFromText('POINT (106,8181303 -6,208749)',4326), N'2019-03-22 20:57:18.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'175', geography::STGeomFromText('POINT (106,8181303 -6,208749)',4326), N'2019-03-22 20:57:20.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'176', geography::STGeomFromText('POINT (106,8181279 -6,2087463)',4326), N'2019-03-22 20:59:02.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'177', geography::STGeomFromText('POINT (106,8181301 -6,2087488)',4326), N'2019-03-22 21:09:48.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'178', geography::STGeomFromText('POINT (106,8181279 -6,2087463)',4326), N'2019-03-22 21:31:27.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'179', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 14:40:08.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'180', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 14:46:00.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'181', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 14:47:25.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'182', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 14:48:14.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'183', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 14:48:51.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'184', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 14:49:42.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'185', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 14:51:24.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'186', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 14:53:55.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'187', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 14:55:34.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'188', geography::STGeomFromText('POINT (106,8161993 -6,2088913)',4326), N'2019-03-27 14:56:12.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'189', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 14:56:57.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'190', geography::STGeomFromText('POINT (106,8161993 -6,2088913)',4326), N'2019-03-27 14:57:04.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'191', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), N'2019-03-27 14:58:52.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'192', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), N'2019-03-27 15:02:17.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'193', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), N'2019-03-27 15:02:43.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'194', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), N'2019-03-27 15:02:47.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'195', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:03:33.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'196', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:08:05.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'197', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:08:24.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'198', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), N'2019-03-27 15:12:37.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'199', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), N'2019-03-27 15:14:54.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'200', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:15:01.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'201', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), N'2019-03-27 15:17:38.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'202', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:45:10.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'203', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 15:45:53.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'204', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 15:46:21.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'205', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 15:48:48.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'206', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 15:48:52.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'207', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:49:02.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'208', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:51:12.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'209', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:51:30.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'210', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:51:49.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'211', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:52:08.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'212', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:52:56.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'213', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:53:42.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'214', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:53:52.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'215', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:55:09.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'216', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:55:55.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'217', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 15:56:25.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'218', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 15:56:45.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'219', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:57:00.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'220', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:58:58.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'221', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:59:35.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'222', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:59:38.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'223', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 15:59:52.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'224', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:00:05.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'225', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:01:13.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'226', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:03:53.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'227', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:04:22.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'228', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:04:37.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'229', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:04:49.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'230', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:06:02.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'231', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:06:22.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'232', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:06:58.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'233', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:08:56.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'234', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:09:06.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'235', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:09:14.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'236', geography::STGeomFromText('POINT (106,8153288 -6,2056162)',4326), N'2019-03-27 16:09:21.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'237', geography::STGeomFromText('POINT (106,8153288 -6,2056162)',4326), N'2019-03-27 16:09:30.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'238', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:09:43.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'239', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:10:34.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'240', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:13:01.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'241', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:13:23.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'242', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:13:34.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'243', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:13:46.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'244', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:14:00.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'245', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:14:07.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'246', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:18:21.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'247', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:18:25.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'248', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:18:34.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'249', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:18:47.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'250', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:18:51.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'251', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:18:57.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'252', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:19:11.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'253', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 16:19:21.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'254', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:19:42.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'255', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 16:20:10.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'256', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 19:24:31.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'257', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 19:33:52.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'258', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 19:34:33.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'259', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 20:04:58.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'260', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 20:12:47.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'261', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 20:14:22.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'262', geography::STGeomFromText('POINT (106,8180874 -6,2093065)',4326), N'2019-03-27 20:14:33.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'263', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 20:14:58.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'264', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-27 20:15:14.000', N'17')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'265', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-28 11:35:56.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'266', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-28 11:59:51.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'267', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:22:38.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'268', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:22:54.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'269', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:23:02.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'270', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:23:04.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'271', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:23:06.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'272', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:23:27.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'273', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:23:30.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'274', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:23:34.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'275', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:23:37.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'276', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:23:40.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'277', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:25:16.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'278', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:25:21.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'279', geography::STGeomFromText('POINT (106,7477563 -6,3876732)',4326), N'2019-03-29 11:25:24.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1265', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:15:11.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1266', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:15:11.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1267', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:15:41.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1268', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:15:41.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1269', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:15:58.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1270', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:15:59.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1271', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:16:18.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1272', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:16:18.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1273', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:16:45.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1274', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:16:45.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1275', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:16:58.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1276', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:16:58.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1277', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:17:18.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1278', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:17:18.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1279', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:17:39.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1280', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:17:39.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1281', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:17:59.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1282', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:17:59.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1283', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:18:19.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1284', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:18:19.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1285', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:18:44.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1286', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:18:44.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1287', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:19:04.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1288', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:19:04.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1289', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:19:24.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1290', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:19:24.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1291', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:19:45.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1292', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:19:45.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1293', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:20:09.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1294', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:20:09.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1295', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:20:34.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1296', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:20:34.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1297', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:20:57.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1298', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:20:57.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1299', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:21:23.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1300', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 12:21:24.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1301', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:00:01.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1302', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:00:01.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1303', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:00:21.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1304', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:00:21.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1305', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:00:51.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1306', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:00:51.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1307', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:01:05.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1308', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:01:05.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1309', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:01:26.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1310', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:01:26.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1311', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:01:46.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1312', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:01:46.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1313', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:02:06.000', N'37')
GO
GO
INSERT INTO [dbo].[STA_Log] ([Id], [Location], [timing], [Id_user]) VALUES (N'1314', geography::STGeomFromText('POINT (107,1677251 -6,248012)',4326), N'2019-03-30 13:02:06.000', N'37')
GO
GO
SET IDENTITY_INSERT [dbo].[STA_Log] OFF
GO

-- ----------------------------
-- Table structure for STA_OfficeLocation
-- ----------------------------
DROP TABLE [dbo].[STA_OfficeLocation]
GO
CREATE TABLE [dbo].[STA_OfficeLocation] (
[Id] int NOT NULL IDENTITY(1,1) ,
[Id_User] int NULL ,
[office_name] varchar(255) NULL ,
[last_edited] datetime NULL ,
[Location] geography NOT NULL ,
[In] time(7) NULL ,
[Out] time(7) NULL 
)


GO
DBCC CHECKIDENT(N'[dbo].[STA_OfficeLocation]', RESEED, 24)
GO

-- ----------------------------
-- Records of STA_OfficeLocation
-- ----------------------------
SET IDENTITY_INSERT [dbo].[STA_OfficeLocation] ON
GO
INSERT INTO [dbo].[STA_OfficeLocation] ([Id], [Id_User], [office_name], [last_edited], [Location], [In], [Out]) VALUES (N'14', N'2040', N'PT Solman (Citylofts)', N'2019-03-26 10:51:54.000', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), null, null)
GO
GO
INSERT INTO [dbo].[STA_OfficeLocation] ([Id], [Id_User], [office_name], [last_edited], [Location], [In], [Out]) VALUES (N'24', N'0', N'STA Sudirman', N'2019-03-27 20:14:02.000', geography::STGeomFromText('POINT (106,818388 -6,2088966)',4326), null, null)
GO
GO
SET IDENTITY_INSERT [dbo].[STA_OfficeLocation] OFF
GO

-- ----------------------------
-- Table structure for STA_Users
-- ----------------------------
DROP TABLE [dbo].[STA_Users]
GO
CREATE TABLE [dbo].[STA_Users] (
[Id] int NOT NULL IDENTITY(1,1) ,
[username] varchar(200) NOT NULL ,
[password] varchar(200) NOT NULL ,
[role] varchar(50) NOT NULL DEFAULT ('user') ,
[last_login] datetime NULL DEFAULT ('0000-00-00 00:00:00') ,
[platform] varchar(250) NULL ,
[token] text NULL ,
[full_name] varchar(250) NULL ,
[email] varchar(250) NULL ,
[nohp] varchar(250) NULL ,
[title] varchar(250) NULL ,
[status] varchar(50) NOT NULL DEFAULT ('active') ,
[created_at] datetime NULL 
)


GO
DBCC CHECKIDENT(N'[dbo].[STA_Users]', RESEED, 2041)
GO

-- ----------------------------
-- Records of STA_Users
-- ----------------------------
SET IDENTITY_INSERT [dbo].[STA_Users] ON
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'1', N'faisalas', N'password', N'admin', null, N'android', N'ASDASDAS', N'mUHAMMAD FAISAL', N'faisanworkmail@gmail.com', N'8912', N'ceo', N'active', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'16', N'paisal', N'40f76a99081962bf657df2c0b7e0e13e', N'admin', null, null, null, N'Faisal Budiman', N'faisalormail@gmail.com', N'99762129', N'programmer', N'inactive', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'17', N'faisal', N'f4668288fdbf9773dd9779d412942905', N'admin', N'2019-03-31 06:00:41.000', N'Operating System : Unknown OS Platform Browser : Unknown Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTcsInVzZXJuYW1lIjoiZmFpc2FsIiwicm9sZSI6ImFkbWluIiwiZnVsbF9uYW1lIjoiTXVoYW1tYWQgRmFpc2FsIEJ1ZGltYW4iLCJ0aW1lX2xvZ2luIjoiMjAxOS0wMy0zMSAwNjowMDo0MSIsInRpbWUiOjE1NTM5ODY4NDF9.8tAGK03qYETMRp2qUM1ZhKhnJCiQuqeMZef30AzfE_w', N'Muhammad Faisal Budiman', N'faisal@gmail.com', N'0892717283', N'programmer', N'active', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'21', N'faislal', N'few23fvbaisas112e1al', N'admin', null, null, null, N'Muhammad Faisal Budiman', N'budiman@budiman.com', N'769', N'owner', N'active', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'24', N'faisal99', N'f4668288fdbf9773dd9779d412942905', N'admin', null, null, null, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'26', N'faisal299', N'f4668288fdbf9773dd9779d412942905', N'admin', null, null, null, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'27', N'faisal3299', N'f4668288fdbf9773dd9779d412942905', N'admin', null, null, null, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'29', N'faisalganteng', N'faisalkaya', N'admin', null, null, null, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'30', N'faisal32s99', N'f4668288fdbf9773dd9779d412942905', N'admin', null, null, null, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'31', N'faisal32sa99', N'f4668288fdbf9773dd9779d412942905', N'admin', null, null, null, N'Faisal Budiman', N'faisalormail@gmail.com', N'29', N'programmer', N'inactive', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'32', N'cangganteng', N'f4668288fdbf9773dd9779d412942905', N'admin', null, null, null, N'Faisal Budiman', N'cangganteng@gmail.com', N'08961212', N'programmer', N'inactive', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'37', N'arulajeh', N'3faea069be64139f17e53f4a8742effd', N'user', N'2019-03-30 11:43:40.000', N'Operating System : Android Browser : Handheld Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MzcsInVzZXJuYW1lIjoiYXJ1bGFqZWgiLCJyb2xlIjoidXNlciIsImZ1bGxfbmFtZSI6IlN5YWhydWxsb2giLCJ0aW1lX2xvZ2luIjoiMjAxOS0wMy0zMCAxMTo0Mzo0MCIsInRpbWUiOjE1NTM5MjEwMjB9.Bq_MSaz4n3o4YDYgdS4tejqbAbikYmFQVsE_J4L0v9U', N'Syahrulloh', N'arulajeh@gmail.com', N'089988999888', N'Numpang lewat', N'active', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'1036', N'diana', N'3a23bb515e06d0e944ff916e79a7775c', N'user', null, null, null, N'Diana Sari', N'diana@gmail.com', N'081299762129', N'programmer', N'active', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'1037', N'mfbudiman', N'219dc66087d55a2d2ca422a4085cd50c', N'admin', null, null, null, N'Muhammad Faisal Budiman', N'fasisal@gmail.com', N'081299762129', N'programmer', N'active', null)
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'1038', N'budimanmf', N'450258f865dce55ade3f351aa691bcd9', N'admin', null, null, null, N'Muhammad Faisal Budiman', N'fasisal@gmail.com', N'081299762129', N'programmer', N'active', N'2019-03-20 16:37:54.000')
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'1039', N'bagus', N'17b38fc02fd7e92f3edeb6318e3066d8', N'admin', N'2019-03-29 21:18:38.000', N'Operating System : Windows 10 Browser : Chrome', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTAzOSwidXNlcm5hbWUiOiJiYWd1cyIsInJvbGUiOiJhZG1pbiIsImZ1bGxfbmFtZSI6IkJhZ3VzIiwidGltZV9sb2dpbiI6IjIwMTktMDMtMjkgMjE6MTg6MzgiLCJ0aW1lIjoxNTUzODY5MTE4fQ.rk5wUnuDzh1An7CeCxGaMgMAiIsS2JCjYqZ455BmD0Q', N'Bagus', N'bagus@gmail.com', N'0812121221', N'Lead Team', N'active', N'2019-03-22 14:05:26.000')
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'2040', N'juned', N'efe6398127928f1b2e9ef3207fb82663', N'admin', N'2019-03-22 20:38:26.000', N'Operating System : Android Browser : Handheld Browser', N'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MjA0MCwidXNlcm5hbWUiOiJqdW5lZCIsInJvbGUiOiJhZG1pbiIsImZ1bGxfbmFtZSI6Ikp1bmVkIiwidGltZV9sb2dpbiI6IjIwMTktMDMtMjIgMjA6Mzg6MjYiLCJ0aW1lIjoxNTUzMjYxOTA2fQ.lFAGptv8S-UVsk5onTJWhc-SJeKTBIq4mxniSdUMgKU', N'Juned', N'juned@gmail.com', N'081299762129', N'consultant', N'active', N'2019-03-22 19:52:40.000')
GO
GO
INSERT INTO [dbo].[STA_Users] ([Id], [username], [password], [role], [last_login], [platform], [token], [full_name], [email], [nohp], [title], [status], [created_at]) VALUES (N'2041', N'ncang', N'5a78097cec7d3573af1af56694a0e326', N'admin', null, null, null, N'Faisal Budiman', N'ncang@gmail.com', N'081299762129', N'programmer', N'active', N'2019-03-27 19:14:32.000')
GO
GO
SET IDENTITY_INSERT [dbo].[STA_Users] OFF
GO

-- ----------------------------
-- Table structure for STA_UsersAttendance
-- ----------------------------
DROP TABLE [dbo].[STA_UsersAttendance]
GO
CREATE TABLE [dbo].[STA_UsersAttendance] (
[Id] int NOT NULL IDENTITY(1,1) ,
[Id_User] int NOT NULL ,
[date_attend] date NOT NULL ,
[time_come] time(7) NULL ,
[time_return] time(7) NULL ,
[time_break] time(7) NULL ,
[time_end_of_break] time(7) NULL ,
[note] text NULL ,
[mark] varchar(255) NULL ,
[flag] bit NULL 
)


GO
DBCC CHECKIDENT(N'[dbo].[STA_UsersAttendance]', RESEED, 2096)
GO

-- ----------------------------
-- Records of STA_UsersAttendance
-- ----------------------------
SET IDENTITY_INSERT [dbo].[STA_UsersAttendance] ON
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1095', N'17', N'2019-03-27', N'07:00:00.0000000', N'16:00:00.0000000', N'19:33:23.0000000', N'19:33:35.0000000', N'sibuk', N'manual attendance', N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1096', N'37', N'2019-03-28', N'08:00:00.0000000', N'16:00:00.0000000', N'11:31:09.0000000', N'11:31:27.0000000', N'manual', N'manual attendance', N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1097', N'37', N'2019-03-29', N'09:22:34.0000000', N'11:22:39.0000000', N'21:30:19.0000000', N'21:30:26.0000000', N'masuk pagi', N'manual attendance', N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1098', N'17', N'2019-03-29', N'07:00:00.0000000', N'17:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1099', N'1039', N'2019-03-29', N'06:00:00.0000000', N'17:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1100', N'1038', N'2019-03-29', N'06:00:00.0000000', N'17:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1106', N'37', N'2019-03-01', N'07:00:00.0000000', N'13:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1107', N'37', N'2019-03-02', N'07:00:00.0000000', N'14:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1108', N'37', N'2019-03-03', N'07:00:00.0000000', N'15:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1109', N'37', N'2019-03-04', N'07:00:00.0000000', N'16:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1110', N'37', N'2019-03-05', N'07:00:00.0000000', N'15:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1111', N'37', N'2019-03-06', N'07:00:00.0000000', N'16:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1112', N'17', N'2019-03-01', N'07:00:00.0000000', N'18:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'1113', N'17', N'2019-03-09', N'09:45:00.0000000', N'21:00:00.0000000', null, null, null, null, N'0')
GO
GO
INSERT INTO [dbo].[STA_UsersAttendance] ([Id], [Id_User], [date_attend], [time_come], [time_return], [time_break], [time_end_of_break], [note], [mark], [flag]) VALUES (N'2096', N'37', N'2019-03-30', N'12:01:02.0000000', N'12:01:21.0000000', null, null, N'n', N'manual attendance', N'0')
GO
GO
SET IDENTITY_INSERT [dbo].[STA_UsersAttendance] OFF
GO

-- ----------------------------
-- Indexes structure for table STA_Log
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table STA_Log
-- ----------------------------
ALTER TABLE [dbo].[STA_Log] ADD PRIMARY KEY ([Id])
GO

-- ----------------------------
-- Indexes structure for table STA_OfficeLocation
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table STA_OfficeLocation
-- ----------------------------
ALTER TABLE [dbo].[STA_OfficeLocation] ADD PRIMARY KEY ([Id])
GO

-- ----------------------------
-- Indexes structure for table STA_Users
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table STA_Users
-- ----------------------------
ALTER TABLE [dbo].[STA_Users] ADD PRIMARY KEY ([Id])
GO

-- ----------------------------
-- Uniques structure for table STA_Users
-- ----------------------------
ALTER TABLE [dbo].[STA_Users] ADD UNIQUE ([username] ASC)
GO

-- ----------------------------
-- Checks structure for table STA_Users
-- ----------------------------
ALTER TABLE [dbo].[STA_Users] ADD CHECK (([role]='user' OR [role]='admin' OR [role]='super_admin'))
GO
ALTER TABLE [dbo].[STA_Users] ADD CHECK (([status]='inactive' OR [status]='active'))
GO

-- ----------------------------
-- Indexes structure for table STA_UsersAttendance
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table STA_UsersAttendance
-- ----------------------------
ALTER TABLE [dbo].[STA_UsersAttendance] ADD PRIMARY KEY ([Id])
GO
