define({ "api": [
  {
    "type": "post",
    "url": "/Api?con=Admin_article&act=blog_category_list_add",
    "title": "博文分类：添加",
    "name": "blog_category_list_add",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>分类名</p>"
          }
        ]
      }
    },
    "description": "<p>添加博文</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_article&act=blog_category_list_del",
    "title": "博文分类：删除",
    "name": "blog_category_list_del",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          }
        ]
      }
    },
    "description": "<p>删除对应分类名</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_article&act=blog_category_list_edit",
    "title": "博文分类：修改",
    "name": "blog_category_list_edit",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>分类名</p>"
          }
        ]
      }
    },
    "description": "<p>修改对应分类名</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_article&act=blog_category_list_info",
    "title": "博文分类：查看",
    "name": "blog_category_list_info",
    "group": "Admin_article",
    "description": "<p>查看所有分类</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"id\": \"\",\n    \"title\": \"\"\n  },...]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_article&act=blog_text_add",
    "title": "博文内容：添加",
    "name": "blog_text_add",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "cate_id",
            "description": "<p>对应文章分类</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "cover_url",
            "description": "<p>封面图片url</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "descript",
            "description": "<p>文章概述</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "type",
            "description": "<p>文本类型 0=&gt;Markdown 1=&gt;Editor</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "raw_content",
            "description": "<p>未转为html之前的文章内容</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sticky",
            "description": "<p>置顶项[0=&gt;未置顶、1=&gt;置顶]</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "original",
            "description": "<p>[0=&gt;原创,1=&gt;转载]</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "bg_id",
            "description": "<p>对应文章背景主题号【0=&gt;没有背景主题】</p>"
          }
        ]
      }
    },
    "description": "<p>添加对应博文</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_article&act=blog_text_del",
    "title": "博文内容：删除",
    "name": "blog_text_del",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          }
        ]
      }
    },
    "description": "<p>删除对应博文内容</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_article&act=blog_text_edit",
    "title": "博文内容：修改",
    "name": "blog_text_edit",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>文章编号</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "cate_id",
            "description": "<p>对应文章分类</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "cover_url",
            "description": "<p>封面图片url</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "descript",
            "description": "<p>文章概述</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "type",
            "description": "<p>文本类型 0=&gt;Markdown 1=&gt;Editor</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "raw_content",
            "description": "<p>未转为html之前的文章内容</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sticky",
            "description": "<p>置顶项[0=&gt;未置顶、1=&gt;置顶]</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "original",
            "description": "<p>[0=&gt;原创,1=&gt;转载]</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "bg_id",
            "description": "<p>对应文章背景主题号【0=&gt;没有背景主题】</p>"
          }
        ]
      }
    },
    "description": "<p>添加博文</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_article&act=blog_text_find",
    "title": "博文内容：查看",
    "name": "blog_text_find",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>文章id</p>"
          }
        ]
      }
    },
    "description": "<p>修改前，查看对应文章相关内容</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\":  \"\",\n  {\n    \"id\":  \"\",\n    \"cate_id\":  \"\",\n    \"cover_url\":  \"\",\n    \"title\":  \"\",\n    \"descript\":  \"\",\n    \"type\":  \"\",\n    \"raw_content\":  \"\",\n    \"content\":  \"\",\n    \"statistic\":  \"\",\n    \"last_time\":  \"\",\n    \"time\":  \"\",\n    \"sticky\":  \"\",\n    \"original\":  \"\",\n    \"bg_id\":  \"\",\n    \"cate_name\":  \"\",\n    \"bg_url\":  \"\",\n  }]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_article&act=blog_text_info",
    "title": "博文内容：分页查看",
    "name": "blog_text_info",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          }
        ]
      }
    },
    "description": "<p>获取对应分页数据</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"cover_url\": \"\",\n    \"descript\": \"\",\n    \"type\": \"\",\n    \"sticky\": \"\",\n    \"original\": \"\",\n    \"title\": \"\",\n    \"id\": \"\",\n    \"cate_name\": \"\"\n  }, ...],\n  \"page_count\": \"\",\n  \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_article&act=blog_text_search",
    "title": "博文内容：模糊搜索文章",
    "name": "blog_text_search",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>文章名</p>"
          }
        ]
      }
    },
    "description": "<p>依据文章标题、文章描述，模糊搜索文章 --- Q：有必要通过coreseek搜索吗？A：数据量目前2000条都没达到，连普通索引都可以不建</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"cover_url\": \"\",\n    \"descript\": \"\",\n    \"type\": \"\",\n    \"sticky\": \"\",\n    \"original\": \"\",\n    \"title\": \"\",\n    \"id\": \"\",\n    \"cate_name\": \"\"\n  }, ...]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_article&act=comment_del",
    "title": "评论：删除",
    "name": "comment_del",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          }
        ]
      }
    },
    "description": "<p>删除评论</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_article&act=comment_list_inner",
    "title": "评论：查看楼中楼",
    "name": "comment_list_inner",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          }
        ]
      }
    },
    "description": "<p>分页获取主楼评论数据</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n  \"article_id\": \"\",\n  \"title\": \"\",\n  \"name\": \"\",\n  \"pic\": \"\",\n  \"id\": \"\",\n  \"floor_id\": \"\",\n  \"time\": \"\",\n  \"content\": \"\"\n  }, ...],\n  \"page_count\": \"\",\n  \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_article&act=comment_list_main",
    "title": "评论：查看主楼",
    "name": "comment_list_main",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          }
        ]
      }
    },
    "description": "<p>分页获取主楼评论数据</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n  \"id\": \"\",\n  \"article_id\": \"\",\n  \"time\": \"\",\n  \"content\": \"\",\n  \"title\": \"\",\n  \"name\": \"\",\n  \"pic\": \"\"\n  }, ...],\n  \"page_count\": \"\",\n  \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_article&act=reply_del",
    "title": "回复：删除",
    "name": "reply_del",
    "group": "Admin_article",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          }
        ]
      }
    },
    "description": "<p>删除评论</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_article.php",
    "groupTitle": "Admin_article"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_basic&act=background_list_add",
    "title": "背景主题：修改",
    "name": "background_list_add",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "url",
            "description": "<p>图片地址</p>"
          }
        ]
      }
    },
    "description": "<p>修改背景主题</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_basic&act=background_list_add",
    "title": "背景主题：添加",
    "name": "background_list_add",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "url",
            "description": "<p>图片地址</p>"
          }
        ]
      }
    },
    "description": "<p>添加背景主题</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_basic&act=background_list_del",
    "title": "背景主题：删除",
    "name": "background_list_del",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          }
        ]
      }
    },
    "description": "<p>删除某个背景主题</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_basic&act=background_list_info",
    "title": "背景主题：分页查看",
    "name": "background_list_info",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          }
        ]
      }
    },
    "description": "<p>获取背景主题数据</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"info\": [{\n      \"id\": \"\",\n      \"url\": \"\",\n    }, ...],\n    \"page_count\": \"\",\n    \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_basic&act=basic_info",
    "title": "个人信息：查看",
    "name": "basic_info",
    "group": "Admin_basic",
    "description": "<p>查看已设置的：个人简介、回复头像...</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"info_pic\": \"\",\n    \"reply_pic\": \"\",\n    \"descript\": \"\",\n    \"name\": \"\",\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_basic&act=friend_link_add",
    "title": "友情链接：添加",
    "name": "friend_link_add",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>站点名称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "url",
            "description": "<p>站点地址</p>"
          }
        ]
      }
    },
    "description": "<p>添加友情链接</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_basic&act=friend_link_del",
    "title": "友情链接：删除",
    "name": "friend_link_del",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          }
        ]
      }
    },
    "description": "<p>删除某个友情链接</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_basic&act=friend_link_edit",
    "title": "友情链接：修改",
    "name": "friend_link_edit",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>主键</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>站点名</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "url",
            "description": "<p>链接</p>"
          }
        ]
      }
    },
    "description": "<p>友情链接相关信息修改</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_basic&act=friend_link_info",
    "title": "友情链接：查看",
    "name": "friend_link_info",
    "group": "Admin_basic",
    "description": "<p>一次查看所有友情链接地址</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"info\": [{\n      \"id\": \"\",\n      \"title\": \"\",\n      \"url\": \"\",\n    }, ...]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_basic&act=logout",
    "title": "注销",
    "name": "logout",
    "group": "Admin_basic",
    "description": "<p>管理员注销</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_basic&act=pwd_edit",
    "title": "个人信息：修改",
    "name": "pwd_edit",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>新的帐号名</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "new_pwd",
            "description": "<p>新密码</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "re_pwd",
            "description": "<p>再次输入新密码，格式不作要求</p>"
          }
        ]
      }
    },
    "description": "<p>修改头像、个人简介</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_basic&act=pwd_edit",
    "title": "帐号以及密码:修改",
    "name": "pwd_edit",
    "group": "Admin_basic",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>新的帐号名</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "new_pwd",
            "description": "<p>新密码</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "re_pwd",
            "description": "<p>再次输入新密码，格式不作要求</p>"
          }
        ]
      }
    },
    "description": "<p>修改帐号以及密码，操作成功后需要重新登陆</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_basic.php",
    "groupTitle": "Admin_basic"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_behaviour&act=user_behaviour_info",
    "title": "访问足迹：查看",
    "name": "user_behaviour_info",
    "group": "Admin_behaviour",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          }
        ]
      }
    },
    "description": "<p>分页查看访问足迹</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"ip\": \"\",\n    \"url\": \"\",\n    \"location\": \"\",\n    \"time\": \"\",\n  }, ...],\n  \"page_count\": \"\",\n  \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_behaviour.php",
    "groupTitle": "Admin_behaviour"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_behaviour&act=user_deny_ip_add",
    "title": "恶意ip：添加",
    "name": "user_deny_ip_add",
    "group": "Admin_behaviour",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ip",
            "description": "<p>ip地址</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "expire",
            "description": "<p>过期时间，单位秒</p>"
          }
        ]
      }
    },
    "description": "<p>删除某个背景主题</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_behaviour.php",
    "groupTitle": "Admin_behaviour"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_behaviour&act=user_deny_ip_del",
    "title": "恶意ip：删除",
    "name": "user_deny_ip_del",
    "group": "Admin_behaviour",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ip",
            "description": "<p>ip地址</p>"
          }
        ]
      }
    },
    "description": "<p>删除某个背景主题</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_behaviour.php",
    "groupTitle": "Admin_behaviour"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_behaviour&act=user_deny_ip_edit",
    "title": "恶意ip：修改",
    "name": "user_deny_ip_edit",
    "group": "Admin_behaviour",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ip",
            "description": "<p>ip地址</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "expire",
            "description": "<p>过期时间</p>"
          }
        ]
      }
    },
    "description": "<p>修改对应ip的过期时间</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_behaviour.php",
    "groupTitle": "Admin_behaviour"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_behaviour&act=user_deny_ip_info",
    "title": "恶意ip：查看",
    "name": "user_deny_ip_info",
    "group": "Admin_behaviour",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          }
        ]
      }
    },
    "description": "<p>分页查看恶意ip信息</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"ip\": \"\",\n    \"time\": \"\",\n    \"expire\": \"\",\n  }, ...],\n  \"page_count\": \"\",\n  \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_behaviour.php",
    "groupTitle": "Admin_behaviour"
  },
  {
    "type": "get",
    "url": "/Api?con=Admin_behaviour&act=user_info",
    "title": "第三方用户：查看",
    "name": "user_info",
    "group": "Admin_behaviour",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          }
        ]
      }
    },
    "description": "<p>分页查看第三方用户信息</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"pic\": \"\",\n    \"name\": \"\",\n    \"type\": \"\",\n  }, ...],\n  \"page_count\": \"\",\n  \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_behaviour.php",
    "groupTitle": "Admin_behaviour"
  },
  {
    "type": "post",
    "url": "/Api?con=Admin_behaviour&act=login",
    "title": "登陆入口",
    "name": "login",
    "group": "Admin_common",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>帐号</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "pwd",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "description": "<p>后台帐号登录</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true,\n     \"url\": \"\",\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Admin_common.php",
    "groupTitle": "Admin_common"
  },
  {
    "type": "get",
    "url": "/Api?con=Common_basic&act=blog_category_list_info",
    "title": "博文分类信息",
    "name": "blog_category_list_info",
    "group": "Common_basic",
    "description": "<p>查看所有分类</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"id\": \"\",\n    \"title\": \"\"\n    \"total\":\"\"\n  },...]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_basic.php",
    "groupTitle": "Common_basic"
  },
  {
    "type": "get",
    "url": "/Api?con=Common_basic&act=friend_link_info",
    "title": "友情链接列表",
    "name": "friend_link_info",
    "group": "Common_basic",
    "description": "<p>查看友情链接地址列表信息</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n \"info\": [{\n     \"id\": \"\",\n     \"title\": \"\",\n     \"url\": \"\"\n  },...],\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_basic.php",
    "groupTitle": "Common_basic"
  },
  {
    "type": "get",
    "url": "/Api?con=Common_basic&act=get_index_article_list",
    "title": "依据类别号或者关键词，进行文章分页",
    "name": "get_index_article_list",
    "group": "Common_basic",
    "description": "<p>首页分页，或者搜索</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "search",
            "description": "<p>依据关键词，可选</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "cate_id",
            "description": "<p>依据分类号，可选</p>"
          }
        ]
      }
    },
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"code\": 200,\n    \"detail\": \"success\",\n    \"data\":\n    {\n        \"info\": [\n        {\n            \"cover_url\": \"http:\\/\\/pic.90sjimg.com\\/back_pic\\/u\\/00\\/05\\/60\\/99\\/55eea32d51e90.jpg\",\n            \"descript\": \"3月2日止\",\n            \"type\": 0,\n            \"sticky\": 0,\n            \"original\": 0,\n            \"title\": \"短期复习计划\",\n            \"id\": 26,\n            \"statistic\": 0,\n            \"cate_id\": 15,\n            \"time\": \"2018-02-23\",\n            \"cate_name\": \"书单\"\n        },...],\n        \"page_count\": 1,\n        \"total\": 5\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_basic.php",
    "groupTitle": "Common_basic"
  },
  {
    "type": "get",
    "url": "/Api?con=Common_basic&act=logout",
    "title": "用户注销",
    "name": "logout",
    "group": "Common_basic",
    "description": "<p>用户注销</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 302 Moved Temporatily",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_basic.php",
    "groupTitle": "Common_basic"
  },
  {
    "type": "post",
    "url": "/Api?con=Common_behaviour&act=user_behaviour_add",
    "title": "访问足迹：添加",
    "name": "user_behaviour_add",
    "group": "Common_behaviour",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "url",
            "description": "<p>访问地址</p>"
          }
        ]
      }
    },
    "description": "<p>记录人们访问过的页面足迹</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_behaviour.php",
    "groupTitle": "Common_behaviour"
  },
  {
    "type": "post",
    "url": "/Api?con=Common_reply&act=check_auth",
    "title": "评论权限检测",
    "name": "check_auth",
    "group": "Common_reply",
    "description": "<p>作为接口，失败时才有输出，内部调用时，返回用户id相关数组</p>",
    "version": "2.0.0",
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"Err\": \"1014\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_reply.php",
    "groupTitle": "Common_reply"
  },
  {
    "type": "post",
    "url": "/Api?con=Common_reply&act=comment_add",
    "title": "评论：添加",
    "name": "comment_add",
    "group": "Common_reply",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "article_id",
            "description": "<p>文章号 ，但 0=&gt; 留言</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          }
        ]
      }
    },
    "description": "<p>添加主楼回复</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_reply.php",
    "groupTitle": "Common_reply"
  },
  {
    "type": "get",
    "url": "/Api?con=Common_reply&act=comment_info",
    "title": "评论：查看主楼",
    "name": "comment_info",
    "group": "Common_reply",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "article_id",
            "description": "<p>文章号</p>"
          }
        ]
      }
    },
    "description": "<p>分页获取主楼评论数据</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"id\": \"\",\n    \"time\": \"\",\n    \"content\": \"\",\n    \"name\": \"\",\n    \"type\": \"\",\n    \"pic\": \"\",\n  }, ...],\n  \"page_count\": \"\",\n  \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_reply.php",
    "groupTitle": "Common_reply"
  },
  {
    "type": "post",
    "url": "/Api?con=Common_reply&act=reply_add",
    "title": "楼中楼：添加",
    "name": "reply_add",
    "group": "Common_reply",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "floor_id",
            "description": "<p>文章号 ，但 0=&gt; 留言</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          }
        ]
      }
    },
    "description": "<p>添加主楼回复</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"status\": true\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_reply.php",
    "groupTitle": "Common_reply"
  },
  {
    "type": "get",
    "url": "/Api?con=Common_reply&act=reply_info",
    "title": "楼中楼：查看",
    "name": "reply_info",
    "group": "Common_reply",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "to_page",
            "description": "<p>页码，默认值为1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "floor_id",
            "description": "<p>文章号</p>"
          }
        ]
      }
    },
    "description": "<p>分页查看楼中楼</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"info\": [{\n    \"id\": \"\",\n    \"time\": \"\",\n    \"content\": \"\",\n    \"name\": \"\",\n    \"type\": \"\",\n    \"pic\": \"\",\n  }, ...],\n  \"page_count\": \"\",\n  \"total\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Common_reply.php",
    "groupTitle": "Common_reply"
  },
  {
    "type": "post",
    "url": "/Api?con=Editor&act=pic",
    "title": "图片上传",
    "name": "pic",
    "group": "Editor",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "file",
            "optional": false,
            "field": "upfile",
            "description": "<p>上传的文件[图片]的name字段</p>"
          }
        ]
      }
    },
    "description": "<p>单张图片上传</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"state\"    : \"\",\n  \"url\"      : \"\",\n  \"title\"    : \"\",\n  \"original\" : \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Editor.php",
    "groupTitle": "Editor"
  },
  {
    "type": "post",
    "url": "/Api?con=Media&act=kugou_music",
    "title": "酷狗音乐接口",
    "name": "kugou_music",
    "group": "Media",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "fileHash",
            "description": "<p>对应音乐的文件哈希</p>"
          }
        ]
      }
    },
    "description": "<p>获取酷狗对应音乐的播放地址</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n     \"url\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Media.php",
    "groupTitle": "Media"
  },
  {
    "type": "get",
    "url": "/Api?con=Slide_Verify&act=captchar",
    "title": "获取动态加载的验证码图片",
    "name": "captchar",
    "group": "Slide_Verify",
    "description": "<p>该html里面有待验证的base64数据的图片</p>",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\nhtml字符串",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Slide_Verify.php",
    "groupTitle": "Slide_Verify"
  },
  {
    "type": "get",
    "url": "/Api?con=Slide_Verify&act=check",
    "title": "验证码，校验",
    "name": "check",
    "group": "Slide_Verify",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"Err\": \"\",\n  \"out\":\"\",\n  \"status\":\"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Slide_Verify.php",
    "groupTitle": "Slide_Verify"
  },
  {
    "type": "get",
    "url": "/Api?con=Slide_Verify&act=init",
    "title": "初始验证码页面",
    "name": "init",
    "group": "Slide_Verify",
    "version": "2.0.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\n初始验证码页面的html",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/Slide_Verify.php",
    "groupTitle": "Slide_Verify"
  }
] });
