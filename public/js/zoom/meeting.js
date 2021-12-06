(function () {
  var testTool = window.testTool;
  // get meeting args from url
  var tmpArgs = testTool.parseQuery();
  var meetingConfig = {
    apiKey: tmpArgs.apiKey,
    meetingNumber: tmpArgs.mn,
    userName: (function () {
      if (tmpArgs.name) {
        try {
          return testTool.b64DecodeUnicode(tmpArgs.name);
        } catch (e) {
          return tmpArgs.name;
        }
      }
      return "";
    })(),
    passWord: tmpArgs.pwd,
    leaveUrl: "/event/ended",
    role: parseInt(tmpArgs.role, 10),
    userEmail: (function () {
      try {
        return testTool.b64DecodeUnicode(tmpArgs.email);
      } catch (e) {
        return tmpArgs.email;
      }
    })(),
    lang: tmpArgs.lang,
    signature: tmpArgs.signature || "",
    china: tmpArgs.china === "1",
  };

  // a tool use debug mobile device
  if (testTool.isMobileDevice()) {
    vConsole = new VConsole();
  }
  // it's option if you want to change the WebSDK dependency link resources. setZoomJSLib must be run at first
  // ZoomMtg.setZoomJSLib("https://source.zoom.us/1.7.9/lib", "/av"); // CDN version defaul
  if (meetingConfig.china)
    ZoomMtg.setZoomJSLib("https://jssdk.zoomus.cn/1.7.9/lib", "/av"); // china cdn option
  ZoomMtg.preLoadWasm();
  ZoomMtg.prepareJssdk();
  function beginJoin(signature) {
    ZoomMtg.i18n.load(meetingConfig.lang);
 
    ZoomMtg.init({
      leaveUrl: meetingConfig.leaveUrl,
      webEndpoint: meetingConfig.webEndpoint,
      isSupportAV: true,
      debug:true,
      disableInvite: true, //optional
      meetingInfo: [
        'topic',
        'host',
        'mn',
        'pwd',
        'telPwd',
        'invite',
        'participant',
        'dc',
        'enctype',
        'report'
      ],
      success: function () {
        ZoomMtg.i18n.load(meetingConfig.lang);
        console.log("zoom loaded");
        console.log(meetingConfig);
        // ZoomMtg.join({
        //   meetingNumber: meetingConfig.meetingNumber,
        //   userName: meetingConfig.userName,
        //   signature: signature,
        //   apiKey: meetingConfig.apiKey,
        //   userEmail: meetingConfig.userEmail,
        //   passWord: meetingConfig.passWord,
        //   success: function (res) {
        //     console.log("zoom respose",res);
        //     ZoomMtg.getAttendeeslist({});
        //     // ZoomMtg.getCurrentUser({
        //     //   success: function (res) {
        //     //     setTimeout(function(){
        //     //       let el = document.querySelector('[aria-label="Raise Hand"');
        //     //       if(el && !window.isDelegate){
        //     //         el.style.display = "none";
        //     //       }
        //     //     }, 2000);
        //     //   },
        //     // });
        //   },
        //   error: function (res) {
        //     console.log(res);
        //   },
        // });
      },
      error: function (res) {
        console.log(res);
      },
    });

    ZoomMtg.join({
      meetingNumber: meetingConfig.meetingNumber,
      userName: meetingConfig.userName,
      signature: signature,
      apiKey: meetingConfig.apiKey,
      userEmail: meetingConfig.userEmail,
      passWord: meetingConfig.passWord,
      success: function (res) {
        console.log("zoom respose",res);
        ZoomMtg.getAttendeeslist({});
        // ZoomMtg.getCurrentUser({
        //   success: function (res) {
        //     setTimeout(function(){
        //       let el = document.querySelector('[aria-label="Raise Hand"');
        //       if(el && !window.isDelegate){
        //         el.style.display = "none";
        //       }
        //     }, 2000);
        //   },
        // });
      },
      error: function (res) {
        console.log(res);
      },
    });
  }

  beginJoin(meetingConfig.signature);
})();
