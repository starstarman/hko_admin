    ///����cookie   
    function setCookie(NameOfCookie, value)   
    {   
    //@����:�����������������µ�cookie:   
    //cookie������,�洢��Cookieֵ,   
    // �Լ�Cookie���ڵ�ʱ��.     30��
    // �⼸���ǰ�����ת��Ϊ�Ϸ�������  
    expiredays=30;
    var ExpireDate = new Date ();   
    ExpireDate.setTime(ExpireDate.getTime() + (expiredays * 24 * 3600 * 1000));   
      
    // ���������������洢cookie��,ֻ��򵥵�Ϊ"document.cookie"��ֵ����.   
    // ע������ͨ��toGMTstring()������ת������GMTʱ�䡣   
      
    document.cookie = NameOfCookie + "=" + escape(value) +   
      ((expiredays == null) ? "" : "; expires=" + ExpireDate.toGMTString());   
    }   
      
    ///��ȡcookieֵ   
    function getCookie(NameOfCookie)   
    {   
      
    // �������Ǽ����cookie�Ƿ����.   
    // �����������document.cookie�ĳ���Ϊ0   
      
    if (document.cookie.length > 0)   
    {   
      
    // �������Ǽ����cookie�������Ƿ������document.cookie   
      
    // ��Ϊ��ֹһ��cookieֵ�洢,���Լ�ʹdocument.cookie�ĳ��Ȳ�Ϊ0Ҳ���ܱ�֤������Ҫ�����ֵ�cookie����   
    //����������Ҫ��һ�������Ƿ���������Ҫ��cookie   
    //���begin�ı���ֵ�õ�����-1��ô˵��������   
      
    begin = document.cookie.indexOf(NameOfCookie+"=");   
    if (begin != -1)      
    {   
      
    // ˵���������ǵ�cookie.   
      
    begin += NameOfCookie.length+1;//cookieֵ�ĳ�ʼλ��   
    end = document.cookie.indexOf(";", begin);//����λ��   
    if (end == -1) end = document.cookie.length;//û��;��endΪ�ַ�������λ��   
    return unescape(document.cookie.substring(begin, end)); }   
    }   
      
    return null;   
      
    // cookie�����ڷ���null   
    }   
      
    ///ɾ��cookie   
    function delCookie (NameOfCookie)   
    {   
    // �ú��������cookie�Ƿ����ã�����������򽫹���ʱ�������ȥ��ʱ��;   
    //ʣ�¾ͽ�������ϵͳ�ʵ�ʱ������cookie��   
      
    if (getCookie(NameOfCookie)) {   
    document.cookie = NameOfCookie + "=" +   
    "; expires=Thu, 01-Jan-70 00:00:01 GMT";   
    }   
    }  