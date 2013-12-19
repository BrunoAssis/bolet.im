require "spec_helper"

describe TeacherClassesController do
  describe "routing" do

    it "routes to #index" do
      get("/teacher_classes").should route_to("teacher_classes#index")
    end

    it "routes to #new" do
      get("/teacher_classes/new").should route_to("teacher_classes#new")
    end

    it "routes to #show" do
      get("/teacher_classes/1").should route_to("teacher_classes#show", :id => "1")
    end

    it "routes to #edit" do
      get("/teacher_classes/1/edit").should route_to("teacher_classes#edit", :id => "1")
    end

    it "routes to #create" do
      post("/teacher_classes").should route_to("teacher_classes#create")
    end

    it "routes to #update" do
      put("/teacher_classes/1").should route_to("teacher_classes#update", :id => "1")
    end

    it "routes to #destroy" do
      delete("/teacher_classes/1").should route_to("teacher_classes#destroy", :id => "1")
    end

  end
end
