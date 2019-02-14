<?php 
  session_start();
  error_reporting(0);   
  include "config/connection.php";
  include "config/library.php";

  if (isset($_SESSION['id'])) {
    if ($_SESSION['level']=='superuser') {
      $iden = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM rb_users WHERE id_user='$_SESSION[id]'"));
    }
  }
  
?>
<!DOCTYPE html>
<html lang='en'> 
<head>
    <title>Dashboard | SIA</title>
    <meta content='admin template, administration template, bootstrap icons, bootstrap template, dashboard, flat design, flat template, bootstrap flat' name='keywords'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.' name='description'>
    <meta content='BublinaStudio.com' name='author'>
    <meta content='all' name='robots'>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!--[if IE]> <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <![endif]-->
    <link href='assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='assets/images/meta_icons/apple-touch-icon-precomposed.png' rel='apple-touch-icon-precomposed'>
    <!-- / START - page related stylesheets [optional] -->
    <link href="assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/stylesheets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/stylesheets/plugins/wysihtml/wysihtml.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / END - page related stylesheets [optional] -->
    <!-- / bootstrap [required] -->
    <link href="assets/stylesheets/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / theme file [required] -->
    <link href="assets/stylesheets/light-theme.css" rel="stylesheet" type="text/css" media="all" id="color-settings-body-color" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="assets/stylesheets/theme-colors.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/stylesheets/plugins/datatables/datatables.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / demo file [not required!] -->
    <link href="assets/stylesheets/demo.css" rel="stylesheet" type="text/css" media="all" />
  
  </head>
  <body class='contrast-red '>
    <header class='main-header'>
      <?php include 'header.php'; ?>
    </header>
    <div id='wrapper'> 
      <div id='main-nav-bg'></div>
      <nav id='main-nav'>
        <div class='navigation'>
          
            <?php 
            if ($_SESSION['level']=='siswa') {
               include "menu/menu-siswa.php";
            }
            elseif ($_SESSION['level']=='kepala') {
                    include "menu-kepala.php";
            }
            elseif ($_SESSION['level']=='guru') {
                    include "menu/menu-guru.php";
            }
            else{
              include "menu/menu-admin.php";
            } 

            ?>
         
        </div>
      </nav>
      <section id='content'>
        <div class='container'>
            <div class='row' id='content-wrapper'>
              <div class='col-xs-12'>
               <?php
                //part home 
                  if ($_GET['module']=='home' OR $_GET['module']=='') {
                    if ($_SESSION['level']=='siswa') {
                      include "modul/mod_homsiswa/home_siswa.php";
                    }
                    elseif ($_SESSION['level']=='guru') {
                      include "modul/mod_homgur/home_guru.php";
                    }
                    else{
                      include "view_home.php";
                    }
                }
                

                elseif ($_GET['module']=='identitas') {
                    cek_session_admin();
                    include "modul/mod_identitas/identitas.php";
                  }
                elseif ($_GET['module']=='tahunakademik') {
                    include "modul/mod_tahunakademik/tahunakademik.php";
                  }
                elseif ($_GET['module']=='kurikulum') {
                    include "modul/mod_kurikullum/kurikulum.php";
                  }
                elseif ($_GET['module']=='gedung') {
                        include "modul/mod_gedung/gedung.php";
                  } 
                  elseif ($_GET['module']=='kelas') {
                       include "modul/mod_kelas/kelas.php";
                     }   
                else{
                    echo "<h1>Under Construction</h1>";
                  } 
               ?>
              </div>
            </div>
          <footer id='footer'>
            <?php include "footer.php"; ?>
          </footer>
      </div>
      </section>
    </div>
    <!-- / jquery [required] -->
    <script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="assets/javascripts/jquery/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
    <!-- / retina -->
    <script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="assets/javascripts/theme.js" type="text/javascript"></script>
    <!-- / demo file [not required!] -->
    <script src="assets/javascripts/demo.js" type="text/javascript"></script>
    <!-- / START - page related files and scripts [optional] -->
    <script src="assets/javascripts/plugins/flot/excanvas.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script>
      var data, dataset, gd, options, previousLabel, previousPoint, showTooltip, ticks;
      var blue, data, datareal, getRandomData, green, i, newOrders, options, orange, orders, placeholder, plot, purple, randNumber, randSmallerNumber, red, series, totalPoints, update, updateInterval;
      var red = "#f34541";
      var orange = "#f8a326";
      var blue = "#00acec";
      var purple = "#9564e2";
      var green = "#49bf67";
      randNumber = function() {
        return ((Math.floor(Math.random() * (1 + 50 - 20))) + 20) * 800;
      };
      randSmallerNumber = function() {
        return ((Math.floor(Math.random() * (1 + 40 - 20))) + 10) * 200;
      };
      if ($("#stats-chart1").length !== 0) {
        orders = [[1, randNumber() - 10], [2, randNumber() - 10], [3, randNumber() - 10], [4, randNumber()], [5, randNumber()], [6, 4 + randNumber()], [7, 5 + randNumber()], [8, 6 + randNumber()], [9, 6 + randNumber()], [10, 8 + randNumber()], [11, 9 + randNumber()], [12, 10 + randNumber()], [13, 11 + randNumber()], [14, 12 + randNumber()], [15, 13 + randNumber()], [16, 14 + randNumber()], [17, 15 + randNumber()], [18, 15 + randNumber()], [19, 16 + randNumber()], [20, 17 + randNumber()], [21, 18 + randNumber()], [22, 19 + randNumber()], [23, 20 + randNumber()], [24, 21 + randNumber()], [25, 14 + randNumber()], [26, 24 + randNumber()], [27, 25 + randNumber()], [28, 26 + randNumber()], [29, 27 + randNumber()], [30, 31 + randNumber()]];
        newOrders = [[1, randSmallerNumber() - 10], [2, randSmallerNumber() - 10], [3, randSmallerNumber() - 10], [4, randSmallerNumber()], [5, randSmallerNumber()], [6, 4 + randSmallerNumber()], [7, 5 + randSmallerNumber()], [8, 6 + randSmallerNumber()], [9, 6 + randSmallerNumber()], [10, 8 + randSmallerNumber()], [11, 9 + randSmallerNumber()], [12, 10 + randSmallerNumber()], [13, 11 + randSmallerNumber()], [14, 12 + randSmallerNumber()], [15, 13 + randSmallerNumber()], [16, 14 + randSmallerNumber()], [17, 15 + randSmallerNumber()], [18, 15 + randSmallerNumber()], [19, 16 + randSmallerNumber()], [20, 17 + randSmallerNumber()], [21, 18 + randSmallerNumber()], [22, 19 + randSmallerNumber()], [23, 20 + randSmallerNumber()], [24, 21 + randSmallerNumber()], [25, 14 + randSmallerNumber()], [26, 24 + randSmallerNumber()], [27, 25 + randSmallerNumber()], [28, 26 + randSmallerNumber()], [29, 27 + randSmallerNumber()], [30, 31 + randSmallerNumber()]];
        plot = $.plot($("#stats-chart1"), [
          {
            data: orders,
            label: "Orders"
          }, {
            data: newOrders,
            label: "New rders"
          }
        ], {
          series: {
            lines: {
              show: true,
              lineWidth: 3
            },
            shadowSize: 0
          },
          legend: {
            show: false
          },
          grid: {
            clickable: true,
            hoverable: true,
            borderWidth: 0,
            tickColor: "#f4f7f9"
          },
          colors: ["#00acec", "#f8a326"]
        });
      }
      if ($("#stats-chart2").length !== 0) {
        orders = [[1, randNumber() - 5], [2, randNumber() - 6], [3, randNumber() - 10], [4, randNumber()], [5, randNumber()], [6, 4 + randNumber()], [7, 10 + randNumber()], [8, 12 + randNumber()], [9, 6 + randNumber()], [10, 8 + randNumber()], [11, 9 + randNumber()], [12, 10 + randNumber()], [13, 11 + randNumber()], [14, 12 + randNumber()], [15, 3 + randNumber()], [16, 14 + randNumber()], [17, 14 + randNumber()], [18, 15 + randNumber()], [19, 16 + randNumber()], [20, 17 + randNumber()], [21, 18 + randNumber()], [22, 19 + randNumber()], [23, 20 + randNumber()], [24, 21 + randNumber()], [25, 14 + randNumber()], [26, 24 + randNumber()], [27, 25 + randNumber()], [28, 26 + randNumber()], [29, 27 + randNumber()], [30, 31 + randNumber()]];
        newOrders = [[1, randSmallerNumber() - 10], [2, randSmallerNumber() - 10], [3, randSmallerNumber() - 10], [4, randSmallerNumber()], [5, randSmallerNumber()], [6, 4 + randSmallerNumber()], [7, 5 + randSmallerNumber()], [8, 6 + randSmallerNumber()], [9, 6 + randSmallerNumber()], [10, 8 + randSmallerNumber()], [11, 9 + randSmallerNumber()], [12, 10 + randSmallerNumber()], [13, 11 + randSmallerNumber()], [14, 12 + randSmallerNumber()], [15, 13 + randSmallerNumber()], [16, 14 + randSmallerNumber()], [17, 15 + randSmallerNumber()], [18, 15 + randSmallerNumber()], [19, 16 + randSmallerNumber()], [20, 17 + randSmallerNumber()], [21, 18 + randSmallerNumber()], [22, 19 + randSmallerNumber()], [23, 20 + randSmallerNumber()], [24, 21 + randSmallerNumber()], [25, 14 + randSmallerNumber()], [26, 24 + randSmallerNumber()], [27, 25 + randSmallerNumber()], [28, 26 + randSmallerNumber()], [29, 27 + randSmallerNumber()], [30, 31 + randSmallerNumber()]];
        plot = $.plot($("#stats-chart2"), [
          {
            data: orders,
            label: "Orders"
          }, {
            data: newOrders,
            label: "New orders"
          }
        ], {
          series: {
            lines: {
              show: true,
              lineWidth: 3
            },
            shadowSize: 0
          },
          legend: {
            show: false
          },
          grid: {
            clickable: true,
            hoverable: true,
            borderWidth: 0,
            tickColor: "#f4f7f9"
          },
          colors: ["#f34541", "#49bf67"]
        });
        $("#stats-chart2").bind("plotclick", function(event, pos, item) {
          if (item) {
            return alert("Yeah! You just clicked on point " + item.dataIndex + " in " + item.series.label + ".");
          }
        });
      }
    </script>
    
    <script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/timeago/jquery.timeago.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script>
      (function() {
        var cal, calendarDate, d, m, y;
      
        this.setDraggableEvents = function() {
          return $("#events .external-event").each(function() {
            var eventObject;
            eventObject = {
              title: $.trim($(this).text())
            };
            $(this).data("eventObject", eventObject);
            return $(this).draggable({
              zIndex: 999,
              revert: true,
              revertDuration: 0
            });
          });
        };
      
        setDraggableEvents();
      
        calendarDate = new Date();
      
        d = calendarDate.getDate();
      
        m = calendarDate.getMonth();
      
        y = calendarDate.getFullYear();
      
        cal = $(".full-calendar-demo").fullCalendar({
          header: {
            center: "title",
            left: "month,agendaWeek,agendaDay,listWeek",
            right: "prev,today,next"
          },
          buttonIcons: {
            prev: "fa-chevron-left",
            next: "fa-chevron-right"
          },
          buttonText: {
            today: "Today",
            agendaDay: "Day",
            agendaWeek: "Week",
            month: "Month",
            listWeek: "List"
          },
          droppable: true,
          editable: true,
          selectable: true,
          select: function(start, end, allDay) {
            return bootbox.prompt("Event title", function(title) {
              if (title !== null) {
                cal.fullCalendar("renderEvent", {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                }, true);
                return cal.fullCalendar('unselect');
              }
            });
          },
          eventClick: function(calEvent, jsEvent, view) {
            return bootbox.dialog({
              message: $("<form class='form'><label>Change event name</label></form><input id='new-event-title' class='form-control' type='text' value='" + calEvent.title + "' /> "),
              buttons: {
                "delete": {
                  label: "<i class='fa fa-trash-o'></i> Delete Event",
                  className: "pull-left",
                  callback: function() {
                    return cal.fullCalendar("removeEvents", function(ev) {
                      return ev._id === calEvent._id;
                    });
                  }
                },
                success: {
                  label: "<i class='fa fa-floppy-o'></i> Save",
                  className: "btn-success",
                  callback: function() {
                    calEvent.title = $("#new-event-title").val();
                    return cal.fullCalendar('updateEvent', calEvent);
                  }
                }
              }
            });
          },
          drop: function(date, allDay) {
            var copiedEventObject, eventClass, originalEventObject;
            originalEventObject = $(this).data("eventObject");
            originalEventObject.id = Math.floor(Math.random() * 99999);
            eventClass = $(this).attr('data-event-class');
            console.log(originalEventObject);
            copiedEventObject = $.extend({}, originalEventObject);
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            if (eventClass) {
              copiedEventObject["className"] = [eventClass];
            }
            $(".full-calendar-demo").fullCalendar("renderEvent", copiedEventObject, true);
            if ($("#calendar-remove-after-drop").is(":checked")) {
              return $(this).remove();
            }
          },
          events: [
            {
              id: "event1",
              title: "All Day Event",
              start: moment().startOf('month').format('YYYY-MM-DD'),
              className: 'event-orange'
            }, {
              id: "event2",
              title: "Long Event",
              start: moment().subtract(5, 'day').format('YYYY-MM-DD'),
              end: moment().subtract(1, 'day').format('YYYY-MM-DD'),
              className: "event-red"
            }, {
              id: 999,
              id: "event3",
              title: "Repeating Event",
              start: moment().subtract(3, 'day').format('YYYY-MM-DD HH:mm'),
              allDay: false,
              className: "event-blue"
            }, {
              id: 999,
              id: "event3",
              title: "Repeating Event",
              start: moment().add(4, 'day').format('YYYY-MM-DD HH:mm'),
              allDay: false,
              className: "event-green"
            }, {
              id: "event4",
              title: "Meeting",
              start: moment().startOf('day').add(10, 'hours').add(30, 'minute').format('YYYY-MM-DD HH:mm'),
              allDay: false,
              className: "event-orange"
            }, {
              id: "event5",
              title: "Lunch",
              start: moment().startOf('day').add(12, 'hours').add(0, 'minute').format('YYYY-MM-DD HH:mm'),
              end: moment().startOf('day').add(14, 'hours').add(0, 'minute').format('YYYY-MM-DD HH:mm'),
              allDay: false,
              className: "event-red"
            }, {
              id: "event6",
              title: "Birthday Party",
              start: moment().startOf('day').add(1, 'day').add(19, 'hours').add(0, 'minute').format('YYYY-MM-DD HH:mm'),
              end: moment().startOf('day').add(1, 'day').add(22, 'hours').add(30, 'minute').format('YYYY-MM-DD HH:mm'),
              allDay: false,
              className: "event-purple"
            }
          ]
        });
      
      }).call(this);
    </script>
    <script>
      $(".chat .new-message").on('submit', function(e) {
        var chat, date, li, message, months, reply, scrollable, sender, timeago;
        date = new Date();
        months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        chat = $(this).parents(".chat");
        message = $(this).find("#message_body").val();
        $(this).find("#message_body").val("");
        if (message.length !== 0) {
          li = chat.find("li.message").first().clone();
          li.find(".body").text(message);
          timeago = li.find(".timeago");
          timeago.removeClass("in");
          var month = (date.getMonth() + 1);
          var date_day = (date.getDate());
          timeago.attr("title", "" + (date.getFullYear()) + "-" + (month<10 ? '0' : '') + month + "-" + (date_day<10 ? '0' : '' ) + date_day + " " + (date.getHours()) + ":" + (date.getMinutes()) + ":" + (date.getSeconds()) + " +0200");
          timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
          sender = li.find(".name").text().trim();
          chat.find("ul").append(li);
          setTimeAgo(timeago);
          scrollable = li.parents(".scrollable");
          $(scrollable).slimScroll({
            scrollTo: scrollable.prop('scrollHeight') + "px"
          });
          li.effect("highlight", {}, 500);
          reply = scrollable.find("li").not(":contains('" + sender + "')").first().clone();
          setTimeout((function() {
            date = new Date();
            timeago = reply.find(".timeago");
            timeago.attr("title", "" + (date.getFullYear()) + "-" + (month<10 ? '0' : '') + month + "-" + (date_day<10 ? '0' : '' ) + date_day + " " + (date.getHours()) + ":" + (date.getMinutes()) + ":" + (date.getSeconds()) + " +0200");
            timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
            scrollable.find("ul").append(reply);
            setTimeAgo(timeago);
            $(scrollable).slimScroll({
              scrollTo: scrollable.prop('scrollHeight') + "px"
            });
            return reply.effect("highlight", {}, 500);
          }), 1000);
        }
        return e.preventDefault();
      });
    </script>
    <script>
      $(".recent-activity .ok").on("click", function(e) {
        $(this).tooltip("hide");
        $(this).parents("li").fadeOut(500, function() {
          return $(this).remove();
        });
        return e.preventDefault();
      });
      $(".recent-activity .remove").on("click", function(e) {
        $(this).tooltip("hide");
        $(this).parents("li").fadeOut(500, function() {
          return $(this).remove();
        });
        return e.preventDefault();
      });
      $("#comments-more-activity").on("click", function(e) {
        $(this).button("loading");
        setTimeout((function() {
          var list;
          list = $("#comments-more-activity").parent().parent().find("ul");
          list.append(list.find("li:not(:first)").clone().effect("highlight", {}, 500));
          return $("#comments-more-activity").button("reset");
        }), 1000);
        e.preventDefault();
        return false;
      });
      $("#users-more-activity").on("click", function(e) {
        $(this).button("loading");
        setTimeout((function() {
          var list;
          list = $("#users-more-activity").parent().parent().find("ul");
          list.append(list.find("li:not(:first)").clone().effect("highlight", {}, 500));
          return $("#users-more-activity").button("reset");
        }), 1000);
        e.preventDefault();
        return false;
      });
    </script>
    <script>
      (function() {
        $("#daterange").daterangepicker({
          ranges: {
            Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
            "Last 30 Days": [moment().subtract("days", 29), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")]
          },
          startDate: moment().subtract("days", 29),
          endDate: moment(),
          opens: "left",
          cancelClass: "btn-danger",
          buttonClasses: ['btn', 'btn-sm']
        }, function(start, end) {
          return $("#daterange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
        });
      
      }).call(this);
    </script>
    <script>
      $(document).ready(function() {
        var select2icon;
        select2icon = function(e) {
          return "<i class='fa " + e.text + "'></i> .fa." + e.text;
        };
        $("#select2-icon").select2({
          templateResult: select2icon,
          templateSelection: select2icon,
          escapeMarkup: function(e) {
            return e;
          }
        });
      
        $("#select2-tags").select2({
          tags: true
        });
    </script>
    <script>
      $(".todo-list .new-todo").on('submit', function(e) {
        var li, todo_name;
        todo_name = $(this).find("#todo_name").val();
        $(this).find("#todo_name").val("");
        if (todo_name.length !== 0) {
          li = $(this).parents(".todo-list").find("li.item").first().clone();
          li.find("input[type='checkbox']").attr("checked", false);
          li.removeClass("important").removeClass("done");
          li.find("label.todo span").text(todo_name);
          $(".todo-list ul").first().prepend(li);
          li.effect("highlight", {}, 500);
        }
        return e.preventDefault();
      });
      
      $(".todo-list .actions .remove").on("click", function(e) {
        $(this).tooltip("hide");
        $(this).parents("li").fadeOut(500, function() {
          return $(this).remove();
        });
        e.stopPropagation();
        e.preventDefault();
        return false;
      });
      
      $(".todo-list .actions .important").on("click", function(e) {
        $(this).parents("li").toggleClass("important");
        e.stopPropagation();
        e.preventDefault();
        return false;
      });
      
      $(".todo-list .check").on("click", function() {
        var checkbox;
        checkbox = $(this).find("input[type='checkbox']");
        if (checkbox.is(":checked")) {
          return $(this).parents("li").addClass("done");
        } else {
          return $(this).parents("li").removeClass("done");
        }
      });
    </script>
    <script src="assets/javascripts/plugins/wysihtml/wysihtml.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/wysihtml/wysihtml-toolbar.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/wysihtml/advanced.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <!-- <script src="assets/javascripts/plugins/select2/select2.js" type="text/javascript"></script> -->

   
    
    <!-- / END - page related files and scripts [optional] -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-42989202-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>

