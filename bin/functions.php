<?php 

    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/UserAPI.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/PageAPI.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/SiteAPI.php";

    function refreshTables() {
        createUserTable();
        createPageTable();
        createSiteTable();
    }

    //User Functions
    
    function createUser($username, $email, $defaultPassword, $role) {
        return UserAPI.createUser($username, $email, $defaultPassword, $role);
    }
    
    function deleteUser($username) {
        return UserAPI.deleteUser($username);
    }
    
    function removeAvatar($username) {
        return UserAPI.removeAvatar($username);
    }
    
    function uploadAvatar($user, $avatar) {
        return UserAPI.uploadAvatar($user, $avatar);
    }
    
    function getAvatar($user) {
        return UserAPI.getAvatar($user);
    }
    
    function updateEmail($user, $email) {
        return UserAPI.updateEmail($user, $email);
    }
    
    function getEmail($user) {
        return UserAPI.getEmail($user);
    }
    
    function updateName($user, $name) {
        return UserAPI.updateName($user, $name);
    }
    
    function getName($user) {
        return UserAPI.getName($user);
    }
    
    function updateWebsite($user, $website) {
        return UserAPI.updateWebsite($user, $website);
    }
    
    function getWebsite($user){
        return UserAPI.getWebsite($user);
    }
    
    function updateUsername($id, $user) {
        return UserAPI.updateUsername($id, $user);
    }
    
    function getId($user) {
        return UserAPI.getId($user);
    }
    
    function updateRole($user, $role) {
        return UserAPI.updateRole($user, $role);
    }
    
    function getRole($user) {
        return UserAPI.getRole($user);
    }
    
    function listUsers() {
        return UserAPI.listUsers();
    }
    
    //Page Functions
    
    function createPage($title, $url, $custom) {
        return PageAPI.createPage($title, $url, $custom);
    }
    
    function deletePage($id) {
        return PageAPI.deletePage($id);
    }
    
    function setPageContent($id, $content) {
        return PageAPI.setPageContent($id, $content);
    }
    
    function getPageContent($id) {
        return PageAPI.getPageContent($id);
    }
    
    function setPageTitle($id, $title) {
        return PageAPI.setPageTitle($id, $title);
    }
    
    function getPageTitle($id) {
        return PageAPI.getPageTitle($id);
    }
    
    function enablePage($id) {
        return PageAPI.enablePage($id);
    }
    
    function disablePage($id) {
        return PageAPI.disablePage($id);
    }
    
    function getPageStatus($id) {
        return PageAPI.getPageStatus($id);
    }
    
    function listPages() {
        return PageAPI.listPages();
    }
    
    //Site Functions
    
    function setActiveDesign($url_key) {
        return SiteAPI.setActiveDesign($url_key);
    }
    
    function getActiveDesign() {
        return SiteAPI.getActiveDesign();
    }
    
    function setRoleName($role, $name) {
        return SiteAPI.setRoleName($role, $name);
    }
    
    function getRoleName($role) {
        return SiteAPI.getRoleName();
    }
    
    function setFrontPageEnabled($enabled) {
        return SiteAPI.setFrontPageEnabled($enabled);
    }
    
    function getFrontPageEnabled() {
        return SiteAPI.getFrontPageEnabled();
    }
    
    function setAuthor($author) {
        return SiteAPI.setAuthor($author);
    }
    
    function getAuthor() {
        return SiteAPI.getAuthor();
    }
    
    function setAuthorHelp($authorHelp) {
        return SiteAPI.setAuthorHelp($authorHelp);
    }
    
    function getAuthorHelp() {
        return SiteAPI.getAuthorHelp();
    }
    
    //Features
    
    function installFeature($id) {
        
    }
    
    function uninstallFeature($id) {
        
    }
    
    function listFeatures() {
        
    }
    
    //Misc
    
    function returnHelp() {
        
    }
?>