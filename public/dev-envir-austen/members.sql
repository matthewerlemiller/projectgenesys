
CREATE TABLE IF NOT EXISTS `members` (
	`MemberId` int(100) DEFAULT NULL,
	`NameFirst` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`NameMiddle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`NameLast` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`DateBirth` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
	`NumberPhone` int(25) DEFAULT NULL,
	`AddressHome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`AddressEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`Parent1NameFirst` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`Parent2NameFirst` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`Parent1NameLast` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`Parent2NameLast` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`Parent1Phone1` int(25) DEFAULT NULL,
	`Parent1Phone2` int(25) DEFAULT NULL,
	`Parent2Phone1` int(25) DEFAULT NULL,
	`Parent2Phone2` int(25) DEFAULT NULL,
	`EmergNameFirst` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`EmergNameLast` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`EmergPhone1` int(25) DEFAULT NULL,
	`EmergPhone2` int(25) DEFAULT NULL,
	`PermissionSlip` boolean COLLATE utf8_unicode_ci DEFAULT NULL,
	`Baptized` boolean COLLATE utf8_unicode_ci DEFAULT NULL,
	`Saved` boolean COLLATE utf8_unicode_ci DEFAULT NULL,
	`Skatepark` boolean COLLATE utf8_unicode_ci DEFAULT NULL,
	`BaptizedDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`Status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`School` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`Gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`M_HsGroup` boolean DEFAULT NULL,
	`M_HsSmGroup` boolean DEFAULT NULL,
	`M_JrGroup` boolean DEFAULT NULL,
	`M_HighGround` boolean DEFAULT NULL,
	`M_BusMinistry` boolean DEFAULT NULL,
	`M_WorshipLead` boolean DEFAULT NULL,
	`M_KidsMinistry` boolean DEFAULT NULL,
	`M_SmGroupLead` boolean DEFAULT NULL,
	`M_LeaderCore` boolean DEFAULT NULL,
	`E_SummerCamp` boolean DEFAULT NULL,
	`E_WinterCamp` boolean DEFAULT NULL,
	`E_FutureQuest` boolean DEFAULT NULL,
	`CheckedIn` boolean DEFAULT NULL,
	`updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL



) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

