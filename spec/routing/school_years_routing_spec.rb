require "spec_helper"

describe SchoolYearsController do
  describe "routing" do

    it "routes to #index" do
      get("/school_years").should route_to("school_years#index")
    end

    it "routes to #new" do
      get("/school_years/new").should route_to("school_years#new")
    end

    it "routes to #show" do
      get("/school_years/1").should route_to("school_years#show", :id => "1")
    end

    it "routes to #edit" do
      get("/school_years/1/edit").should route_to("school_years#edit", :id => "1")
    end

    it "routes to #create" do
      post("/school_years").should route_to("school_years#create")
    end

    it "routes to #update" do
      put("/school_years/1").should route_to("school_years#update", :id => "1")
    end

    it "routes to #destroy" do
      delete("/school_years/1").should route_to("school_years#destroy", :id => "1")
    end

  end
end
